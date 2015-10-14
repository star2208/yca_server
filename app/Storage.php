<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * 存储的文件
 *
 * @author Latrell Chan
 *
 * @SWG\Model(id="Storage")
 * @SWG\Property(name="hash",type="string", description="文件hash")
 * @SWG\Property(name="size",type="integer", description="字节大小")
 * @SWG\Property(name="width",type="integer", description="宽度")
 * @SWG\Property(name="height",type="integer", description="高度")
 * @SWG\Property(name="mime",type="string", description="Mime")
 * @SWG\Property(name="seconds",type="double", description="时长（秒）")
 * @SWG\Property(name="format",type="string", description="文件格式")
 */
class Storage extends Model
{

	protected $table = 'storage';

	protected $primaryKey = 'hash';

	public $incrementing = false;

	/**
	 * 缩略图列表
	 */
	public function thumbnails()
	{
		return $this->belongsToMany('App\Storage', 'thumbnails', 'file_hash', 'storage_hash');
	}
}
