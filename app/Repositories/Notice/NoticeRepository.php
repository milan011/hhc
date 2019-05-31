<?php
namespace App\Repositories\Notice;

use App\Notice;
use App\Repositories\BaseInterface\Repository;
use App\Repositories\Notice\NoticeRepositoryInterface;
use Auth;
use Carbon;
use Datatables;
use DB;
use Debugbar;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use PHPZen\LaravelRbac\Traits\Rbac;
use Session;

class NoticeRepository implements NoticeRepositoryInterface
{

    public function listAllNotices()
    {
        return Notice::lists('name', 'id');
    }

    //根据ID获取公告信息
    public function find($id)
    {
        return Notice::findOrFail($id);
    }

    //获取置顶公告
    public function findTopNotice()
    {
        // return Notice::Where('is_top', '1')->first();
        return Notice::Where('is_top', '1')->orderBy('created_at', 'DESC')->first();
    }

    public function allNotices()
    {
        return Notice::with('belongsToUser')
            ->orderBy('id', 'DESC')
            ->paginate(10);
        // return Notice::with('belongsToUser')->orderBy('id', 'DESC')->paginate(10);
    }

    // 创建公告
    public function create($requestData)
    {
        $requestData['user_id'] = Auth::id();
        // dd($requestData);

        $notice = new Notice;
        $input  = array_replace($requestData->all());
        $notice->fill($input);

        $notice = $notice->create($input);

        return $notice;
    }

    // 修改公告
    public function update($requestData, $id)
    {

        $Notice = Notice::findorFail($id);
        $input  = array_replace($requestData->all());
        $Notice->fill($input)->save();

        return $Notice;
    }

    // 删除公告
    public function destroy($id)
    {
        try {
            $notice           = Notice::findorFail($id);
            $notice->IsDelete = '1';
            $notice->save();

            return $notice;

        } catch (\Illuminate\Database\QueryException $e) {
            return false;
        }
    }
}
