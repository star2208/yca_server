<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 用户文件
 *
 * @author Latrell Chan
 *
 * @SWG\Model(id="UserFile")
 * @SWG\Property(name="id",type="string", description="文件ID")
 * @SWG\Property(name="user",type="morph", description="所属者")
 * @SWG\Property(name="user_type",type="string", enum="['Member','Admin']", description="所属者类型")
 * @SWG\Property(name="storage",type="Storage", description="文件")
 * @SWG\Property(name="filename",type="string", description="文件名")
 * @SWG\Property(name="url",type="string", description="CDN地址")
 */
class UserFile extends Model
{

	protected $table = 'user_files';

	public $incrementing = false;

	protected $appends = [
		'url'
	];

	protected $with = [
		'storage'
	];

	public function __construct(array $attributes = [])
	{
		parent::__construct($attributes);

		// 自动生成文件ID。
		$this->attributes['id'] = uniqueid();
	}

	public static function boot()
	{
		parent::boot();

		static::saving(function ($model)
		{
			$model->filename = preg_replace('/\..*$/i', '', basename($model->filename));
		});
	}

    /**
     * 兼容3.0模型type问题
     */
    public function getUserTypeAttribute(){
        if(isset($this->attributes['user_type'])){

            if(! preg_match('#^App\\\\Models\\\\#',$this->attributes['user_type']) && $this->attributes['user_type']){
                $this->attributes['user_type'] = 'App\Models\\'.$this->attributes['user_type'];
            }
            return $this->attributes['user_type'];
        }
    }

	/**
	 * 所属用户
	 */
	public function user()
	{
		return $this->morphTo();
	}

	/**
	 * 文件
	 */
	public function storage()
	{
		return $this->belongsTo('App\Models\Storage', 'storage_hash');
	}

	/**
	 * 文件CDN地址
	 */
	public function getUrlAttribute()
	{
		return route('FilePull', [
			'id' => $this->id
		]);
	}
}
