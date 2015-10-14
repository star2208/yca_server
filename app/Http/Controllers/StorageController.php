<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Intervention\Image\Facades\Image;
use GetId3_GetId3 as GetId3;
use App\Storage;
use App\UserFile;

/**
 * 文件管理器
 *
 * @author Latrell Chan
 */
class StorageController extends Controller
{

    /**
     * 文件存储库根路径。
     */
    protected $storage_path;

    /**
     * 文件上传字段名。
     */
    protected $filed_name = 'file';

    public function __construct(Request $request, Guard $auth)
    {
        //parent::__construct($request, $auth);
        $this->middleware('auth');
        $this->middleware('json');
        $this->storage_path = base_path('storage/files') . DIRECTORY_SEPARATOR;
    }

    /**
     * 获取文件
     */
    public function getFile(Request $request)
    {
        // 验证数据。
        $this->validate($request, [
            'id' => [
                'required',
                'exists:user_files,id'
            ]
        ]);

        // 取得文件模型。
        $file = UserFile::find($request->input('id'));
        $storage = $file->storage;

        // 取得文件名与拓展名。
        $filename = $file->filename;
        $extension = '.' . $storage->format;
        $disposition = 'attachment';
        $headers = [
            'Content-Type' => $storage->mime
        ];

        // 根据文件Mime处理额外操作。
        switch ($storage->mime) {

            // 图片。
            case 'image/jpeg':
            case 'image/png':
            case 'image/gif':
            case 'image/tiff':

                // 取得欲取的图片尺寸。
                $width = $request->input('width', 0);
                $height = $request->input('height', 0);
                $width = $width > 0 ? ceil($width) : null;
                $height = $height > 0 ? ceil($height) : null;

                // 如果是要取缩略图。
                if ((! is_null($width) || ! is_null($height)) && ($storage->width != $width || $storage->height != $height)) {
                    // 查找当前图片的缩略图列表，是否已经有此尺寸的图片。
                    if (is_null($width) && ! is_null($height)) {
                        $width = ceil($storage->width / $storage->height * $height);
                    }
                    if (is_null($height) && ! is_null($width)) {
                        $height = ceil($storage->height / $storage->width * $width);
                    }
                    $thumbnail = $storage->thumbnails()
                        ->where('width', $width)
                        ->where('height', $height)
                        ->first();

                    // 如果指定尺寸的缩略图不存在，则生成并保存到数据库中。
                    if (is_null($thumbnail)) {

                        // 在缓存目录内创建一个pic前缀的临时文件，并修改推展名。
                        $tmp = tempnam(storage_path('cache'), 'pic');
                        rename($tmp, $tmp .= '.jpg');

                        // 打开原图。
                        $image = Image::make($this->storage_path . $storage->path);
                        // 生成一张需求尺寸的图片，写到创建的临时文件内。
                        // $image->resize($width, $height);
                        $image->fit($width, $height);
                        $image->save($tmp, 60);

                        // 计算文件的hash，并移动文件到文件存储目录。
                        $_hash = md5_file($tmp);
                        $_filename = $_hash . '.' . $image->extension;
                        $_storage = $this->storage_path . $_filename;
                        copy($tmp, $_storage);
                        unlink($tmp);

                        // 保存图片信息到数据库。
                        $thumbnail = Storage::find($_hash);
                        if (is_null($thumbnail)) {
                            $thumbnail = new Storage();
                            $thumbnail->hash = $_hash;
                        }
                        $thumbnail->size = filesize($_storage);
                        $thumbnail->width = $image->width();
                        $thumbnail->height = $image->height();
                        $thumbnail->mime = $image->mime;
                        $thumbnail->format = 'jpeg';
                        $thumbnail->path = $_filename;
                        $thumbnail->save();
                        $storage->thumbnails()->attach($_hash);
                    }

                    // 此次请求使用此缩略图。
                    $storage = $thumbnail;
                    // $filename .= "_{$storage->width}_{$storage->height}";
                    $extension = $storage->format;
                }

                $disposition = 'inline';
                break;

            // 视频。
            case 'video/x-ms-asf':
            case 'video/x-ms-asf':
            case 'video/avi':
            case 'video/x-ivf':
            case 'video/x-mpeg':
            case 'video/x-mpeg':
            case 'video/mpeg4':
            case 'video/x-sgi-movie':
            case 'video/mpeg':
            case 'video/mpeg4':
            case 'video/x-mpg':
            case 'video/x-mpeg':
            case 'video/mpg':
            case 'video/mpg':
            case 'video/x-mpeg':
            case 'video/mpg':
            case 'video/mpeg':
            case 'video/vnd.rn-realvideo':
            case 'video/x-ms-wm':
            case 'video/x-ms-wmv':
            case 'video/x-ms-wmx':
            case 'video/x-ms-wvx':
            case 'video/quicktime':
                unset($headers['Content-Type']);
                $disposition = 'inline';
                break;

            // 音频。
            case 'audio/x-mei-aac':
            case 'audio/aiff':
            case 'audio/aiff':
            case 'audio/aiff':
            case 'audio/basic':
            case 'audio/x-liquid-file':
            case 'audio/x-liquid-secure':
            case 'audio/x-la-lms':
            case 'audio/mpegurl':
            case 'audio/mid':
            case 'audio/mid':
            case 'audio/x-musicnet-download':
            case 'audio/x-musicnet-stream':
            case 'audio/mp1':
            case 'audio/mp2':
            case 'audio/mp3':
            case 'audio/rn-mpeg':
            case 'audio/scpls':
            case 'audio/vnd.rn-realaudio':
            case 'audio/x-pn-realaudio':
            case 'audio/mid':
            case 'audio/x-pn-realaudio':
            case 'audio/x-pn-realaudio-plugin':
            case 'audio/basic':
            case 'audio/wav':
            case 'audio/x-ms-wax':
            case 'audio/x-ms-wma':
            case 'audio/scpls':
                $disposition = 'inline';
                break;
        }

        // 预先转换文件名到ASCII编码。
        $filename = mb_convert_encoding($filename, 'ASCII', 'UTF-8');

        // 生成指定Mime的数据响应。
        return response()->download($this->storage_path . $storage->path, $filename, $headers, $request->input('download', 'false') == 'true' ? 'attachment' : $disposition);
    }

    /**
     * 上传文件
     */
    public function postFile(Request $request, GetId3 $getId3)
    {
        // 验证数据。
        if (!$request->hasFile($this->filed_name)) {
            return response('必须提供 file 字段数据。', 402);
        }

        // 取得上传的文件。
        $file = $request->file($this->filed_name);

        // 获取文件ID3信息。
        $info = $getId3->analyze($file->getRealPath());

        // 修复ID3库对不支持的文件格式的处理。
        if (! isset($info['mime_type'])) {
            $info['mime_type'] = mime_content_type($file->getRealPath());
        }
        $info['fileformat'] = $file->getClientOriginalExtension();

        // 取得文件的hash与文件名。
        $hash = md5_file($file->getRealPath());
        $filename = $hash . '.' . $file->getClientOriginalExtension();

        // 取得hash的文件。
        $storage = Storage::find($hash);

        // 如果文件不存在，则创建文件。
        if (is_null($storage)) {
            $storage = new Storage();
            $storage->hash = $hash;
            $storage->format = @$info['fileformat'] ?  : '';
            $storage->size = @$info['filesize'] ?  : 0;
            $storage->width = @$info['video']['resolution_x'] ?  : 0;
            $storage->height = @$info['video']['resolution_y'] ?  : 0;
            $storage->seconds = @$info['playtime_seconds'] ?  : 0;
            $storage->mime = @$info['mime_type'] ?  : '';
            $storage->path = $filename;
            $storage->save();
            // 移动文件到存储目录
            $file->move($this->storage_path, $filename);
        }

        // 关联用户的文件。
        $userfile = new UserFile();
        $userfile->user()->associate($this->auth->user());
        $userfile->storage()->associate($storage);
        $userfile->filename = $file->getClientOriginalName();
        $userfile->save();

        // 返回结果。
        return $userfile;
    }

    /**
     * 使用文件 hash 上传文件
     */
    public function postFileWithHash(Request $request)
    {
        // 验证数据。
        $this->validate($request, [
            'hash' => [
                'required',
                'exists:storage,hash'
            ],
            'filename' => [
                'required'
            ]
        ]);

        // 取得提交的文件 hash。
        $hash = $request->input('hash');

        // 取得hash的文件。
        $storage = Storage::find($hash);

        // 关联用户的文件。
        $userfile = new UserFile();
        $userfile->user()->associate($this->auth->user());
        $userfile->storage()->associate($storage);
        $userfile->filename = $request->input('filename');
        $userfile->save();

        // 返回结果。
        return UserFile::find($userfile->id);
    }
}
