<template>
    <div>
        <el-dropdown trigger="click">
            <el-button type="primary">
                用户列表<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="userListCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="userListReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                用户添加<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="userAddCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="userAddReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                用户修改<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="userUpdateCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="userUpdateReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                用户删除<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="userDeleteCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="userDeleteReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                赋予用户角色<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="getAllRolesList">所有角色列表</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="getUserRolesCommit">用户角色提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="getUserRolesReturn">用户角色返回Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="giveUserRolesCommit">赋予角色提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="giveUserRolesReturn">赋予角色返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                重置密码<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="userPassResetCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="userPassResetReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                修改密码<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="userPassChangeCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="userPassChangeReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
    </div>
</template>
<script>
import { fetchList, fetchPv, createUser, updateUser, deleteUser, passReset } from '@adminPc/api/user'
import { allRolesList } from '@adminPc/api/role'
import { getUserRoles, giveUserRoles } from '@adminPc/api/user'
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
        userListCommit() {
            const listQuery = {
                token: TOKEN,
                page: 1,
            }
            this.$emit("showJson", listQuery)
            this.$emit("showDialog", true)
        },
        userListReturn() {
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
        userAddCommit() {
            const userData = {
                id: undefined,
                name: null,
                nick_name: null,
                shop_id: null,
                password: '',
                password_confirmation: '',
                telephone: ''
            }
            this.$emit("showJson", userData)
            this.$emit("showDialog", true)
        },
        userAddReturn() {
            const userData = {
                id: undefined,
                name: 'wxm22222211',
                nick_name: 'wxmm222m',
                shop_id: 12,
                password: '111111',
                password_confirmation: '111111',
                telephone: '13731080174'
            }
            createUser(userData).then(response => {
                // console.log(response.data)
                // return false
                const user = response.data

                this.$emit("showJson", user)
                this.$emit("showDialog", true)
            })
        },
        userUpdateCommit() {
            const userData = {
                id: 11,
                name: 'wxm33',
                nick_name: 'wxmgg',
                shop_id: 38,
                password: '111111',
                password_confirmation: '111111',
                telephone: '13731080174'
            }
            this.$emit("showJson", userData)
            this.$emit("showDialog", true)
        },
        userUpdateReturn() {
            const userData = {
                id: 11,
                name: '13703113586',
                nick_name: '刘娟',
                shop_id: 12,
                password: '111111',
                password_confirmation: '111111',
                telephone: '13731080174'
            }
            updateUser(userData).then(response => {
                // console.log(response.data)
                // return false
                const newUser = response.data

                this.$emit("showJson", newUser)
                this.$emit("showDialog", true)
            })
        },
        userDeleteCommit() {
            const commitData = {
                token: TOKEN,
                id: 12,
            }
            this.$emit("showJson", commitData)
            this.$emit("showDialog", true)
        },
        userDeleteReturn() {
            const commitData = {
                token: TOKEN,
                id: 12,
            }
            deleteUser(commitData).then(response => {
                /*console.log(response.data)
                return false*/
                const deUser = response.data

                this.$emit("showJson", deUser)
                this.$emit("showDialog", true)
            })
        },
        getAllRolesList() {
            allRolesList().then(response => {
                /*console.log(response.data)
                return false*/
                const allRoles = response.data

                this.$emit("showJson", allRoles)
                this.$emit("showDialog", true)
            })
        },
        getUserRolesCommit() {
            const commitData = {
                token: TOKEN,
                id: 171,
            }
            this.$emit("showJson", commitData)
            this.$emit("showDialog", true)
        },
        getUserRolesReturn() {
            const commitData = {
                token: TOKEN,
                id: 171,
            }
            getUserRoles(commitData).then(response => {
                /*console.log(response.data)
                return false*/
                const userRole = response.data

                this.$emit("showJson", userRole)
                this.$emit("showDialog", true)
            })

        },
        giveUserRolesCommit() {
            const commitData = {
                token: TOKEN,
                id: 171,
                roles: ["admin", "manager", "customer"]
            }
            this.$emit("showJson", commitData)
            this.$emit("showDialog", true)
        },
        giveUserRolesReturn() {
            const commitData = {
                token: TOKEN,
                id: 171,
                roles: [
                    "md_leader",
                    "insurance_leader",
                    "loan_leader",
                    "manager",
                    "customer",
                    "loan"
                ]
            }
            giveUserRoles(commitData).then(response => {
                /*console.log(response.data)
                return false*/
                const giveUserRoles = response.data

                this.$emit("showJson", giveUserRoles)
                this.$emit("showDialog", true)
            })
        },
        userPassResetCommit(){
            const commitData = {
                token: TOKEN,
                id: 172,
            }
            this.$emit("showJson", commitData)
            this.$emit("showDialog", true)
        },
        userPassResetReturn(){
            const commitData = {
                token: TOKEN,
                id: 172,
            }
            passReset(commitData).then(response => {
                /*console.log(response.data)
                return false*/
                const user = response.data

                this.$emit("showJson", user)
                this.$emit("showDialog", true)
            })
        },
        userPassChangeCommit(){

        },
        userPassChangeReturn(){

        },
    }
};
</script>
<style lang="scss" scoped>
</style>