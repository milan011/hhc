<template>
    <div>
        <el-dropdown trigger="click">
            <el-button type="primary">
                商机列表<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="oppListCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="oppListReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                商机添加<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="oppAddCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="oppAddReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                商机修改<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="oppUpdateCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="oppUpdateReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                商机删除<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="oppDeleteCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="oppDeleteReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                商机分发<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="oppAssignCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="oppAssignReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
    </div>
</template>
<script>
import { getOpportunityList, getOpportunityInfo, assingOpportunityInfo, opportunityInfoAdd, opportunityInfoUpdate, deleteOportunity } from '@adminPc/api/opportunity'
//import { parseTime } from '@/utils'
//import  { infoSelfStatus, jituanStatus, oldBindStatus, collections_type }  from '@/config.js'
import { TOKEN } from '@adminPc/tokenConfig.js'
export default {
    name: 'Opp',
    data() {
        return {
            oppData: {
                mobile: '', //客户电话
                category_name: '', //车型
                enroll_type: '', //咨询类型
                ff_shop: null, //分发门店
            },
            pageQuery: {
                page: 1, //分页
            }
        };
    },
    created() {
        this.listQuery = Object.assign(this.pageQuery, this.oppData)
    },
    methods: {
        oppListCommit() {
            this.$emit("showJson", this.listQuery)
            this.$emit("showDialog", true)
        },
        oppListReturn() {
            getOpportunityList(this.listQuery).then(response => {
                console.log(response.data)
                // return false
                const transactionList = response.data

                this.$emit("showJson", transactionList)
                this.$emit("showDialog", true)
            })
        },
        oppAddCommit() {
            const data = {
                id: undefined,
                name: '', //客户
                mobile: '', //客户电话
                category_name: '', //车型
                enroll_type: '', //咨询类型
                contents: '', //客服沟通信息
            }

            this.$emit("showJson", data)
            this.$emit("showDialog", true)
        },
        oppAddReturn() {
            const data = {
                id: undefined,
                name: '一个客户', //客户
                mobile: '13854214125', //客户电话
                category_name: '飞度', //车型
                enroll_type: '2', //咨询类型
                contents: '好想买啊', //客服沟通信息
            }
            opportunityInfoAdd(data).then(response => {
                console.log(response.data)
                // return false
                const transactionList = response.data

                this.$emit("showJson", transactionList)
                this.$emit("showDialog", true)
            })
        },
        oppUpdateCommit() {
            alert('商机修改提交Json')
        },
        oppUpdateReturn() {
            alert('商机修改返回Json')
        },
        oppDeleteCommit() {
            alert('商机删除提交Json')
        },
        oppDeleteReturn() {
            alert('商机删除返回Json')
        },
        oppAssignCommit() {
            alert('商机分发提交Json')
        },
        oppAssignReturn() {
            alert('商机分发返回Json')
        }
    }
};
</script>
<style lang="scss" scoped>
</style>