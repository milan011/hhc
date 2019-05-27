<template>
    <div>
        <el-dropdown trigger="click">
             <el-button type="primary">
               权限列表<i class="el-icon-arrow-down el-icon--right"></i>
             </el-button>
             <el-dropdown-menu slot="dropdown">
                 <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="perListCommit" >提交Json</el-button>
                 </el-dropdown-item>
                 <el-dropdown-item icon="el-icon-circle-plus">
                     <el-button type="primary" @click="perListReturn" >返回Json</el-button>
                 </el-dropdown-item>
             </el-dropdown-menu>
         </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
              权限添加<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                   <el-button type="primary" @click="perAddCommit" >提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="perAddReturn" >返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
              权限修改<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                   <el-button type="primary" @click="perUpdateCommit" >提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="perUpdateReturn" >返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
              权限删除<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                   <el-button type="primary" @click="perDeleteCommit" >提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="perDeleteReturn" >返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
              角色列表<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                   <el-button type="primary" @click="roleListCommit" >提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="roleListReturn" >返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
              赋予角色权限<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="giveRolePerCommit" >提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="giveRolePerReturn" >返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
              角色添加<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                   <el-button type="primary" @click="roleAddCommit" >提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="roleAddReturn" >返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
              角色修改<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="roleUpdateCommit" >提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="roleUpdateReturn" >返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
              角色删除<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="roleDeleteCommit" >提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="roleDeleteReturn" >返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
    </div>
</template>
<script>
  import { fetchList, fetchPv, createPermission, updatePermission, deletePermission } from '@/api/permission'
  import { getRoleList, createRole, updateRole, deleteRole, getRolePermissions, getPermissions, giveRolePermissions } from '@adminPc/api/role'
  import { TOKEN } from '@adminPc/tokenConfig.js'
  //import { parseTime } from '@/utils'
  //import  { infoSelfStatus, jituanStatus, oldBindStatus, collections_type }  from '@/config.js'
  export default {
    name: 'RolePermission',
    data() {
        props:["dialogVisible", "rInfo"]
        return {
    
        };
    },
    created() {   
      
    },
    methods: {
      perListCommit(){
        const listQuery = {
            token: TOKEN,
            page: 1,
        }
        /*const jsObj = {
            "id":1,
            "name":"wcg",
            "nick_name":"\u738b\u6668\u5149",
            "roles":["admin"],
            "avatar":"https:\/\/wpimg.wallstcn.com\/f778738c-e4f8-4870-b634-56703b4acafe.gif",
            "introduction":"\u6211\u662f\u8d85\u7ea7\u7ba1\u7406\u5458"
        }
        const jsObj2 = {"current_page":1,"data":[{"id":61,"name":"\u4e1c\u6d77\u76db\u666f\u5e97","pid":0,"type":"1","provence_id":10,"city_id":138,"telephone":"15032690604","address":"\u5b66\u82d1\u8def\u4e0e\u6606\u4ed1\u5927\u8857\u4ea4\u53c9\u53e3\u897f\u5357\u4e1c\u6d77\u76db\u666f\u5e95\u5546","qq_number":"15032690604","wx_number":"15032690604","email":"15032690604@qq.com","status":"1","user_id":1,"created_at":"2019-04-24 10:45:44","updated_at":"2019-05-22 06:25:27","deleted_at":null,"is_show":"1","sort":10,"belongs_to_creater":null,"belongs_to_city":{"pid":10,"id":138,"city_name":"\u77f3\u5bb6\u5e84"}},{"id":60,"name":"\u6052\u5927\u534e\u5e9c\u5e97","pid":0,"type":"1","provence_id":10,"city_id":138,"telephone":"15630176009","address":"\u77f3\u5bb6\u5e84\u5e02\u6865\u897f\u533a\u7ef4\u660e\u5357\u5927\u8857\u65b0\u77f3\u5317\u8def\u4ea4\u53c9\u53e3\u5357\u884c50\u7c73\u8def\u897f","qq_number":"15630176009","wx_number":"15630176009","email":"15630176009@qq.com","status":"1","user_id":1,"created_at":"2019-03-18 12:41:21","updated_at":"2019-05-22 06:03:10","deleted_at":null,"is_show":"1","sort":10,"belongs_to_creater":null,"belongs_to_city":{"pid":10,"id":138,"city_name":"\u77f3\u5bb6\u5e84"}},{"id":59,"name":"\u5143\u6c0f\u53bf\u5bfa\u5e84\u5e97","pid":0,"type":"1","provence_id":10,"city_id":138,"telephone":"13513387895","address":"\u5143\u6c0f\u53bf\u5bfa\u5e84\u6751\u4e09\u5c94\u8def\u53e3\u82b1\u56ed\u5357\u90bb\u90ed\u6751\u65b9\u5411\u8def\u897f","qq_number":"13513387895","wx_number":"13513387895","email":"13513387895@qq.com","status":"1","user_id":1,"created_at":"2019-02-14 15:31:09","updated_at":"2019-02-14 15:31:09","deleted_at":null,"is_show":"1","sort":10,"belongs_to_creater":null,"belongs_to_city":{"pid":10,"id":138,"city_name":"\u77f3\u5bb6\u5e84"}},{"id":58,"name":"\u5f00\u53d1\u533a\u6052\u5927\u7eff\u6d32\u5e97","pid":0,"type":"1","provence_id":10,"city_id":138,"telephone":"15531199072","address":"\u77f3\u5bb6\u5e84\u7ecf\u6d4e\u5f00\u53d1\u533a\u963f\u91cc\u5c71\u5927\u8857\u6052\u5927\u7eff\u6d32\u6052\u5927\u5f71\u57ce\u5e95\u5546134\u53f7","qq_number":"15531199072","wx_number":"15531199072","email":"15531199072@qq.com","status":"1","user_id":1,"created_at":"2019-01-01 10:32:47","updated_at":"2019-01-01 10:32:47","deleted_at":null,"is_show":"1","sort":10,"belongs_to_creater":null,"belongs_to_city":{"pid":10,"id":138,"city_name":"\u77f3\u5bb6\u5e84"}},{"id":57,"name":"\u5e02\u573a\u8f66\u6e90","pid":0,"type":"1","provence_id":10,"city_id":138,"telephone":"4006706969","address":"\u6cb3\u5317\u7701\u77f3\u5bb6\u5e84\u5e02\u957f\u5b89\u533a\u4e30\u6536\u8def\u534e\u6e05\u8857\u5357\u884c200\u7c73\u4e1c\u8054\u6559\u80b2","qq_number":"4006706969","wx_number":"taochele","email":"4006706969@qq.com","status":"1","user_id":1,"created_at":"2018-12-25 08:54:55","updated_at":"2018-12-25 08:54:55","deleted_at":null,"is_show":"1","sort":10,"belongs_to_creater":null,"belongs_to_city":{"pid":10,"id":138,"city_name":"\u77f3\u5bb6\u5e84"}},{"id":56,"name":"\u8861\u6c34\u524d\u8fdb\u8857\u5e97","pid":0,"type":"2","provence_id":10,"city_id":143,"telephone":"18830839902","address":"\u6cb3\u5317\u7701\u8861\u6c34\u5e02\u524d\u8fdb\u8def\u4e07\u5fb7\u798f\u897f","qq_number":"1194466365","wx_number":"taochele","email":"1194466365@qq.com","status":"1","user_id":3,"created_at":"2018-11-19 15:42:37","updated_at":"2018-11-19 15:42:37","deleted_at":null,"is_show":"1","sort":10,"belongs_to_creater":null,"belongs_to_city":{"pid":10,"id":143,"city_name":"\u8861\u6c34"}},{"id":55,"name":"\u7075\u5bff\u4eba\u6c11\u8def\u5e97","pid":0,"type":"1","provence_id":10,"city_id":138,"telephone":"15128133823","address":"\u7075\u5bff\u53bf\u4eba\u6c11\u8def80-1\u53f7","qq_number":"501182293","wx_number":"15128133823","email":"15128133823@qq.com","status":"1","user_id":1,"created_at":"2018-11-02 13:08:59","updated_at":"2018-11-02 13:08:59","deleted_at":null,"is_show":"1","sort":10,"belongs_to_creater":null,"belongs_to_city":{"pid":10,"id":138,"city_name":"\u77f3\u5bb6\u5e84"}},{"id":54,"name":"\u897f\u5146\u901a\u5e97","pid":0,"type":"1","provence_id":10,"city_id":138,"telephone":"13111590531","address":" \u6cb3\u5317\u7701\u77f3\u5bb6\u5e84\u5e02\u957f\u5b89\u533a\u897f\u5146\u901a\u9547\u536b\u751f\u9662\u897f\u90bb","qq_number":"13111590531","wx_number":"13111590531","email":"13111590531@qq.com","status":"1","user_id":1,"created_at":"2018-10-28 15:19:02","updated_at":"2018-10-28 15:19:02","deleted_at":null,"is_show":"1","sort":10,"belongs_to_creater":null,"belongs_to_city":{"pid":10,"id":138,"city_name":"\u77f3\u5bb6\u5e84"}},{"id":53,"name":"\u6843\u56ed\u5e97","pid":0,"type":"2","provence_id":10,"city_id":138,"telephone":"17778816101","address":"\u6cb3\u5317\u7701\u77f3\u5bb6\u5e84\u5e02\u957f\u5b89\u533a\u4f53\u80b2\u5927\u8857\u5317\u4e8c\u73af\u4ea4\u53e3\u5317\u884c500\u7c73\u8def\u4e1c","qq_number":"280701267","wx_number":"taochele","email":"280701267@qq.com","status":"1","user_id":3,"created_at":"2018-10-15 14:09:55","updated_at":"2018-10-15 14:09:55","deleted_at":null,"is_show":"1","sort":10,"belongs_to_creater":null,"belongs_to_city":{"pid":10,"id":138,"city_name":"\u77f3\u5bb6\u5e84"}},{"id":52,"name":"\u767d\u4f5b\u5e97","pid":0,"type":"1","provence_id":10,"city_id":138,"telephone":"13903116532","address":"\u6cb3\u5317\u7701\u77f3\u5bb6\u5e84\u5e02\u957f\u5b89\u533a\u767d\u4f5b\u5ba2\u8fd0\u7ad9\u4e1c\u884c500\u7c73\u8def\u5317","qq_number":"243064683","wx_number":"taochele","email":"243064683@qq.com","status":"1","user_id":3,"created_at":"2018-09-13 10:59:47","updated_at":"2018-09-13 10:59:47","deleted_at":null,"is_show":"1","sort":10,"belongs_to_creater":null,"belongs_to_city":{"pid":10,"id":138,"city_name":"\u77f3\u5bb6\u5e84"}}],"first_page_url":"http:\/\/www.tclvue.net\/api\/shopList?page=1","from":1,"last_page":4,"last_page_url":"http:\/\/www.tclvue.net\/api\/shopList?page=4","next_page_url":"http:\/\/www.tclvue.net\/api\/shopList?page=2","path":"http:\/\/www.tclvue.net\/api\/shopList","per_page":10,"prev_page_url":null,"to":10,"total":31} */ 
        // console.log(listQuery)
        // alert(this.$parent.formatJson(jsObj))
        // this.rInfo = this.formatJson(listQuery)
        // const formatObj = this.$emit('formatJs',jsObj)
        // console.log(jsObj)
        // console.log(formatObj)
        this.$emit("showJson", listQuery)
        this.$emit("showDialog", true)
        
      },
      perListReturn(){
        const listQuery = {
            token: TOKEN,
            page: 1,
        }
        fetchList(listQuery).then(response => {
            console.log(response.data)
            // return false
            const perList = response.data
    
            this.$emit("showJson", perList)
            this.$emit("showDialog", true)
        })
      },
      perAddCommit(){
        alert('权限列表提交Json')
      },
      perAddReturn(){
        alert('权限添加返回Json')
      },
      perUpdateCommit(){
        alert('权限修改提交Json')
      },
      perUpdateReturn(){
        alert('权限修改返回Json')
      },
      perupdateCommit(){
        alert('权限修改提交Json')
      }, 
      perDeleteCommit(){
        alert('权限删除提交Json')
      },
      perDeleteReturn(){
        alert('权限删除返回Json')
      },
      roleListCommit(){
        const listQuery = {
            token: TOKEN,
            page: 1,
        }
        this.$emit("showJson", listQuery)
        this.$emit("showDialog", true)
      },
      roleListReturn(){
        const listQuery = {
            token: TOKEN,
            page: 1,
        }
        getRoleList(listQuery).then(response => {
            console.log(response.data)
            // return false
            const roleList = response.data
    
            this.$emit("showJson", roleList)
            this.$emit("showDialog", true)
        })
      },
      roleAddCommit(){
        alert('角色添加提交Json')
      },
      roleAddReturn(){
        alert('角色添加返回Json')
      },
      roleUpdateCommit(){
        alert('角色修改提交Json')
      },
      roleUpdateReturn(){
        alert('角色修改返回Json')
      },
      roleDeleteCommit(){
        alert('角色删除提交Json')
      },
      roleDeleteReturn(){
        alert('角色删除返回Json')
      },
      giveRolePerCommit(){
        alert('赋予角色权限提交Json')
      },
      giveRolePerReturn(){
        alert('赋予角色权限返回Json')
      }
    }
  };
</script>
<style lang="scss" scoped>
  
</style>