<template>
    <div>
     <el-dropdown trigger="click">
                <el-button type="primary">
                  用户列表<i class="el-icon-arrow-down el-icon--right"></i>
                </el-button>
                <el-dropdown-menu slot="dropdown">
                    <el-dropdown-item icon="el-icon-plus">
                       <el-button type="primary" @click="userListCommit" >提交Json</el-button>
                    </el-dropdown-item>
                    <el-dropdown-item icon="el-icon-circle-plus">
                        <el-button type="primary" @click="userListReturn" >返回Json</el-button>
                    </el-dropdown-item>
                </el-dropdown-menu>
            </el-dropdown>
            <el-dropdown trigger="click">
                <el-button type="primary">
                  用户添加<i class="el-icon-arrow-down el-icon--right"></i>
                </el-button>
                <el-dropdown-menu slot="dropdown">
                    <el-dropdown-item icon="el-icon-plus">
                       <el-button type="primary" @click="userAddCommit" >提交Json</el-button>
                    </el-dropdown-item>
                    <el-dropdown-item icon="el-icon-circle-plus">
                        <el-button type="primary" @click="userAddReturn" >返回Json</el-button>
                    </el-dropdown-item>
                </el-dropdown-menu>
            </el-dropdown>
            <el-dropdown trigger="click">
                <el-button type="primary">
                  用户修改<i class="el-icon-arrow-down el-icon--right"></i>
                </el-button>
                <el-dropdown-menu slot="dropdown">
                    <el-dropdown-item icon="el-icon-plus">
                       <el-button type="primary" @click="userUpdateCommit" >提交Json</el-button>
                    </el-dropdown-item>
                    <el-dropdown-item icon="el-icon-circle-plus">
                        <el-button type="primary" @click="userUpdateReturn" >返回Json</el-button>
                    </el-dropdown-item>
                </el-dropdown-menu>
            </el-dropdown>
            <el-dropdown trigger="click">
                <el-button type="primary">
                  用户删除<i class="el-icon-arrow-down el-icon--right"></i>
                </el-button>
                <el-dropdown-menu slot="dropdown">
                    <el-dropdown-item icon="el-icon-plus">
                       <el-button type="primary" @click="userDeleteCommit" >提交Json</el-button>
                    </el-dropdown-item>
                    <el-dropdown-item icon="el-icon-circle-plus">
                        <el-button type="primary" @click="userDeleteReturn" >返回Json</el-button>
                    </el-dropdown-item>
                </el-dropdown-menu>
            </el-dropdown>
            
            <el-dropdown trigger="click">
                <el-button type="primary">
                  赋予用户角色<i class="el-icon-arrow-down el-icon--right"></i>
                </el-button>
                <el-dropdown-menu slot="dropdown">
                    <el-dropdown-item icon="el-icon-plus">
                       <el-button type="primary" @click="giveUserRoleCommit" >提交Json</el-button>
                    </el-dropdown-item>
                    <el-dropdown-item icon="el-icon-circle-plus">
                        <el-button type="primary" @click="giveUserRoleReturn" >返回Json</el-button>
                    </el-dropdown-item>
                </el-dropdown-menu>
            </el-dropdown>
            
    </div>
</template>
<script>
  import { fetchList, fetchPv, createUser, updateUser, deleteUser, passReset } from '@adminPc/api/user'
  import { TOKEN } from '@adminPc/tokenConfig.js'
  //import { parseTime } from '@/utils'
  //import  { infoSelfStatus, jituanStatus, oldBindStatus, collections_type }  from '@/config.js'
  export default {
    name: 'User',
    data() {
      return {

      };
    },
    created() {   
      
    },
    methods: {
      userListCommit(){
        const listQuery = {
            token: TOKEN,
            page: 1,
        }
        this.$emit("showJson", listQuery)
        this.$emit("showDialog", true)
      },
      userListReturn(){
        const listQuery = {
            token: TOKEN,
            page: 3,
        }
        fetchList(listQuery).then(response => {
            console.log(response.data)
            // return false
            const userList = response.data
    
            this.$emit("showJson", userList)
            this.$emit("showDialog", true)
        })
      },
      userAddCommit(){
        alert('用户添加提交Json')
      },
      userAddReturn(){
        alert('用户添加返回Json')
      },
      userUpdateCommit(){
        alert('用户修改提交Json')
      },
      userUpdateReturn(){
        alert('用户修改返回Json')
      },
      userDeleteCommit(){
        alert('用户删除提交Json')
      },
      userDeleteReturn(){
        alert('用户删除返回Json')
      },
      giveUserRoleCommit(){
        alert('赋予用户权限提交Json')
      },
      giveUserRoleReturn(){
        alert('赋予用户权限返回Json')
      }
    }
  };
</script>
<style lang="scss" scoped>
  
</style>