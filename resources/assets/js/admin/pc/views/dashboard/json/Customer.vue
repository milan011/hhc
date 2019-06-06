<template>
    <div>
        <el-dropdown trigger="click">
            <el-button type="primary">
                客户列表<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="customerListCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="customerListReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                客户添加<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="customeraddCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="customeraddReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                客户修改<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="customerUpdateCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="customerUpdateReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                客户详情<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="customerShowCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="customerShowReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
    </div>
</template>
<script>
import { getCustomerList, customerAdd, getCustomerInfo, customerUpdate } from '@adminPc/api/customer'
//import { parseTime } from '@/utils'
//import  { infoSelfStatus, jituanStatus, oldBindStatus, collections_type }  from '@/config.js'
import { TOKEN } from '@adminPc/tokenConfig.js'
export default {
    name: 'Customer',
    data() {
        return {
            customerData: {
                id: undefined,
                customer_name: '', //客户姓名
                telephone: '', //客户电话
                shop_id: null, //所属门店
            },
            pageQuery: {
                page: 1, //分页
                is_self: false, //是否用户所属客户
            },
            listQuery: null,
        };
    },
    created() {
        this.listQuery = Object.assign(this.pageQuery, this.customerData)
    },
    methods: {
        customerListCommit() {
            this.$emit("showJson", this.listQuery)
            this.$emit("showDialog", true)
        },
        customerListReturn() {
            getCustomerList(this.listQuery).then(response => {
                console.log(response.data)
                // return false
                const customerList = response.data

                this.$emit("showJson", customerList)
                this.$emit("showDialog", true)
            })
        },
        customeraddCommit() {
            this.$emit("showJson", this.customerData)
            this.$emit("showDialog", true)
        },
        customeraddReturn() {
            const data = {
                id: undefined,
                customer_name: '新客户', //客户姓名
                telephone: '13984521452', //客户电话
                shop_id: 31, //所属门店
            }
            customerAdd(data).then(response => {
                console.log(response.data)
                // return false
                const customerList = response.data

                this.$emit("showJson", customerList)
                this.$emit("showDialog", true)
            })
        },
        customerUpdateCommit() {
            const data = {
                id: 201,
                customer_name: '新客户22', //客户姓名
                telephone: '13984521452', //客户电话
                shop_id: 31, //所属门店
            }
            this.$emit("showJson", data)
            this.$emit("showDialog", true)
        },
        customerUpdateReturn() {
            const data = {
                id: 201,
                customer_name: '新客户22', //客户姓名
                telephone: '13984521452', //客户电话
                shop_id: 31, //所属门店
            }
            customerUpdate(data).then(response => {
                console.log(response.data)
                // return false
                const customerList = response.data

                this.$emit("showJson", customerList)
                this.$emit("showDialog", true)
            })
        },
        customerShowCommit() {
            alert('客户详情提交Json')
        },
        customerShowReturn() {
            alert('客户详情返回Json')
        },
    }
};
</script>
<style lang="scss" scoped>
</style>