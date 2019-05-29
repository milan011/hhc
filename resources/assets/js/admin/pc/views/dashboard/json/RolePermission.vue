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
        <el-dropdown trigger="click">
            <el-button type="primary">
              赋予角色权限<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="allPersList">所有权限列表</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="getRolePerCommit" >角色权限提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="getRolePerReturn" >角色权限返回Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="giveRolePerCommit" >赋予提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="giveRolePerReturn" >赋予返回Json</el-button>
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
            perCommitData: {
                id: undefined,
                name: '',
                guard_name: 'api',
                description: '权限描述',
                group: '权限分组',
                token: TOKEN,
            },
            roleCommitData: {
              id: undefined,
              name: '',
              guard_name: 'api',
              description: '角色描述',
              token: TOKEN,
            }
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
        const commitData = this.perCommitData

        this.$emit("showJson", commitData)
        this.$emit("showDialog", true)
      },
      perAddReturn(){
        const commitData = this.perCommitData

        createPermission(commitData).then(response => {
            /*console.log(response.data)
            return false*/
            const newPer = response.data
    
            this.$emit("showJson", newPer)
            this.$emit("showDialog", true)
        })
      },
      perUpdateCommit(){
        const commitData = this.perCommitData
        commitData.id = 12;
        this.$emit("showJson", commitData)
        this.$emit("showDialog", true)
      },
      perUpdateReturn(){
        const commitData = this.perCommitData
        commitData.id   = 12;
        commitData.name = 'new2.name2';
        // commitData.guard_name = 'web';
        updatePermission(commitData).then(response => {
            /*console.log(response.data)
            return false*/
            const upPer = response.data
    
            this.$emit("showJson", upPer)
            this.$emit("showDialog", true)
        })
      },
      perupdateCommit(){
        const commitData = {
            token: TOKEN,
            id: 1,
        }
        this.$emit("showJson", commitData)
        this.$emit("showDialog", true)
      }, 
      perDeleteCommit(){
        const commitData = {
            token: TOKEN,
            id: 12,
        }
        this.$emit("showJson", commitData)
        this.$emit("showDialog", true)
      },
      perDeleteReturn(){
        const commitData = {
            token: TOKEN,
            id: 12,
        }
        deletePermission(commitData).then(response => {
            /*console.log(response.data)
            return false*/
            const dePer = response.data
    
            this.$emit("showJson", dePer)
            this.$emit("showDialog", true)
        })
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
        const commitData = this.roleCommitData

        this.$emit("showJson", commitData)
        this.$emit("showDialog", true)
      },
      roleAddReturn(){
        const commitData = this.roleCommitData

        createRole(commitData).then(response => {
            /*console.log(response.data)
            return false*/
            const newRole = response.data
    
            this.$emit("showJson", newRole)
            this.$emit("showDialog", true)
        })
      },
      roleUpdateCommit(){
        const commitData = {
            token: TOKEN,
            id: 1,
        }
        this.$emit("showJson", commitData)
        this.$emit("showDialog", true)
      },
      roleUpdateReturn(){
        const commitData = this.roleCommitData
        commitData.id   = 12;
        commitData.name = 'loan_leader';
        // commitData.guard_name = 'web';
        updateRole(commitData).then(response => {
            /*console.log(response.data)
            return false*/
            const upRole = response.data
    
            this.$emit("showJson", upRole)
            this.$emit("showDialog", true)
        })
      },
      roleDeleteCommit(){
        const commitData = {
            token: TOKEN,
            id: 12,
        }
        this.$emit("showJson", commitData)
        this.$emit("showDialog", true)
      },
      roleDeleteReturn(){
        const commitData = {
            token: TOKEN,
            id: 12,
        }
        deleteRole(commitData).then(response => {
            /*console.log(response.data)
            return false*/
            const deRole = response.data
    
            this.$emit("showJson", deRole)
            this.$emit("showDialog", true)
        })
      },
      allPersList(){
        getPermissions().then(response => {
            /*console.log(response.data)
            return false*/
            const allPer = response.data
    
            this.$emit("showJson", allPer)
            this.$emit("showDialog", true)
        })
      },
      getRolePerCommit(){
        const commitData = {
            token: TOKEN,
            id: 12,
        }
        this.$emit("showJson", commitData)
        this.$emit("showDialog", true)
      },
      getRolePerReturn(){
        const commitData = {
            token: TOKEN,
            id: 2,
        }
        getRolePermissions(commitData).then(response => {
            /*console.log(response.data)
            return false*/
            const rolePer = response.data
    
            this.$emit("showJson", rolePer)
            this.$emit("showDialog", true)
        })
      },
      giveRolePerCommit(){
        const commitData = {
            token: TOKEN,
            id: 12,
            permissions:["notice.check", "car.check", "want.check", "insurance.check", "insurance.create", "insurance.delete", "insurance.update", "customer.check", "customer.create", "customer.update", "customer.delete", "insurance.export"
            ]
        }
        this.$emit("showJson", commitData)
        this.$emit("showDialog", true)
      },
      giveRolePerReturn(){
        const commitData = {
            token: TOKEN,
            id: 14,
            permissions:["notice.check", "car.check",]
        }
        giveRolePermissions(commitData).then(response => {
            /*console.log(response.data)
            return false*/
            const giveRolePer = response.data
    
            this.$emit("showJson", giveRolePer)
            this.$emit("showDialog", true)
        })
      }
    }
  };
</script>
<style lang="scss" scoped>
  
</style>