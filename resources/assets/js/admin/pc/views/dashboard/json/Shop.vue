<template>
    <div>
        <el-dropdown trigger="click">
            <el-button type="primary">
                门店列表<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="shopListCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="shopListReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                门店添加<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="shopAddCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="shopAddReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                门店修改<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="shopUpdateCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="shopUpdateReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                门店删除<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="shopDeleteCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="shopDeleteReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
    </div>
</template>
<script>
import { shopList, createShop, getShop, updateShop, deleteShop } from '@adminPc/api/shop'
//import { parseTime } from '@/utils'
//import  { infoSelfStatus, jituanStatus, oldBindStatus, collections_type }  from '@/config.js'
import { TOKEN } from '@adminPc/tokenConfig.js'
export default {
    name: 'Shop',
    data() {
        return {

        };
    },
    created() {

    },
    methods: {
        shopListCommit() {
            const listQuery = {
                token: TOKEN,
                page: 1,
            }
            this.$emit("showJson", listQuery)
            this.$emit("showDialog", true)
        },
        shopListReturn() {
            const listQuery = {
                token: TOKEN,
                page: 1,
            }
            shopList(listQuery).then(response => {
                console.log(response.data)
                // return false
                const shopList = response.data

                this.$emit("showJson", shopList)
                this.$emit("showDialog", true)
            })
        },
        shopAddCommit() {
            const userData = {
                id: undefined,
                name: '门店名称2222',
                shopCity: ['10', '138'], //省份id.城市id
                type: '1',  
                telephone: '门店电话',       
                address: '门店地址', 
            }
            this.$emit("showJson", userData)
            this.$emit("showDialog", true)
        },
        shopAddReturn() {
            const userData = {
                id: undefined,
                name: 'you一个新店水电费',
                shopCity: ['10', '138'], //省份id.城市id
                type: '1',  
                telephone: '13731080174',       
                address: '门店地址', 
            }
            createShop(userData).then(response => {
                console.log(response.data)
                // return false
                const newShop = response.data

                this.$emit("showJson", newShop)
                this.$emit("showDialog", true)
            })
        },
        shopUpdateCommit() {
            const userData = {
                id: 12,
                name: 'you一个新店2222',
                shopCity: ['10', '138'], //省份id.城市id
                type: '1',  
                telephone: '13731080174',       
                address: '门店地址', 
            }
            this.$emit("showJson", userData)
            this.$emit("showDialog", true)
        },
        shopUpdateReturn() {
            const userData = {
                id: 12,
                name: '元氏店222',
                shopCity: ['10', '138'], //省份id.城市id
                type: '1',  
                telephone: '18833927722',       
                address: '元氏槐阳大街138-5号22222', 
            }
            updateShop(userData).then(response => {
                console.log(response.data)
                // return false
                const shop = response.data

                this.$emit("showJson", shop)
                this.$emit("showDialog", true)
            })
        },
        shopDeleteCommit() {
            const commitData = {
                token: TOKEN,
                id: 12,
            }
            this.$emit("showJson", commitData)
            this.$emit("showDialog", true)
        },
        shopDeleteReturn() {
            const commitData = {
                token: TOKEN,
                id: 12,
            }
            deleteShop(commitData).then(response => {
                /*console.log(response.data)
                return false*/
                const deShop = response.data

                this.$emit("showJson", deShop)
                this.$emit("showDialog", true)
            })
        },
    }
};
</script>
<style lang="scss" scoped>
</style>