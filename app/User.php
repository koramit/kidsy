<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\APIs\UserAPI;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        // 'password', 'remember_token',
    ];

    protected $UserAPI;

    public function __construct(array $attributes = array()) { // สำหรับ class ที่ extends Model ต้องทำ __construct() แบบนี้จ้า
        parent::__construct($attributes);
        $this->UserAPI = new UserAPI;
    }

    public function getData($data) {
        $user = $this->UserAPI->getData(['id' => $this->id, 'field' => $data]);
        return $user['resultText'];
    }

    public function canUseResource($resource) {
        switch ($resource) {
            case 'admin-panel': return $this->isPermissionGranted(1);
            case 'set-biopsy': return $this->isPermissionGranted(2);
            case 'pre-biopsy-data': return $this->isPermissionGranted(3);
            case 'clinical-data': return $this->isPermissionGranted(4);
            case 'procedure-note': return $this->isPermissionGranted(5);
            case 'print-procedure': return $this->isPermissionGranted(6);
            default: return FALSE;
        }
    }

    protected function isPermissionGranted($resourceID) {
        $bin = str_pad(base_convert($this->permissions, 10, 2),env('RESOURCE_PAD'),'0',STR_PAD_LEFT);
        return $bin[strlen($bin) - $resourceID];
    }

    // permissions attribute get and set.
    public function setPermissionsAttribute($value) {
        // $this->attributes['permissions'] = h_en($value);
        $this->attributes['permissions'] = encryptInput($value);
    }
    public function getPermissionsAttribute() {
        // return h_de($this->attributes['permissions']);
        return decryptAttribute($this->attributes['permissions']);
    }

    public static function initUsers(array $ids) {
        foreach($ids as $id => $permissions) {
            $u = User::create(['id' => $id]);
            $u = User::find($id);
            $u->permissions = $permissions;
            $u->save();
        }
    }
    // [1 => 1, 2 => 2, 3 => 36, 4 => 56, 5 => 58]
}
