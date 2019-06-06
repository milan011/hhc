<template>
    <div>
        <el-dropdown trigger="click">
            <el-button type="primary">
                交易列表<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="transListCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="transListReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                交易添加<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="transAddCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="transAddReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                交易详情<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="transShowCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="transShowReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                交易修改<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="transUpdateCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="transUpdateReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                交易反结算<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="transDeleteCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="transDeleteReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
    </div>
</template>
<script>
import { getTransactionList, transactionAdd, getTransactionInfo, transactionUpdate, deleteOportunity } from '@adminPc/api/transaction'
//import { parseTime } from '@/utils'
//import  { infoSelfStatus, jituanStatus, oldBindStatus, collections_type }  from '@/config.js'
import { TOKEN } from '@adminPc/tokenConfig.js'
export default {
    name: 'Trans',
    data() {
        return {
            transData: {
                CarId: '', //车源ID
                BuyId: '', //求购ID
                SaleDate: null, //销售时间
                Shop_Id: null, //所属门店
                is_self: false, //自有交易
            },
            pageQuery: {
                page: 1, //分页
            }
        };
    },
    created() {
        this.listQuery = Object.assign(this.pageQuery, this.transData)
    },
    methods: {
        transListCommit() {
            this.$emit("showJson", this.listQuery)
            this.$emit("showDialog", true)
        },
        transListReturn() {
            getTransactionList(this.listQuery).then(response => {
                console.log(response.data)
                // return false
                const transactionList = response.data

                this.$emit("showJson", transactionList)
                this.$emit("showDialog", true)
            })
        },
        transAddCommit() {
            const data = {
                id: undefined,
                CarId: '', //车源ID
                BuyId: '', //求购ID
                SaledPrice: null, //成交价
                SaleCommission: null, //销售佣金
                LoanCommission: false, //贷款佣金
                OtherCommission: false, //其他佣金
                CarCost: false, //购车成本
                RepairCost: false, //贷款佣金
            }
            this.$emit("showJson", data)
            this.$emit("showDialog", true)
        },
        transAddReturn() {
            const data = {
                id: undefined,
                CarId: '95', //车源ID
                BuyId: '205', //求购ID
                SaledPrice: 12, //成交价
                SaleDate: '2019-06-06 14:20:20', //交易时间
                SaleCommission: 1000, //销售佣金
                LoanCommission: 0, //贷款佣金
                OtherCommission: 0, //其他佣金
                CarCost: 100, //购车成本
                RepairCost: 200, //整备费
            }
            transactionAdd(data).then(response => {
                console.log(response.data)
                // return false
                const transactionList = response.data

                this.$emit("showJson", transactionList)
                this.$emit("showDialog", true)
            })
        },
        transShowCommit() {
            alert('交易详情提交Json')
        },
        transShowReturn() {
            alert('交易详情返回Json')
        },
        transUpdateCommit() {
            alert('交易修改提交Json')
        },
        transUpdateReturn() {
            alert('交易修改返回Json')
        },
        transDeleteCommit() {
            alert('交易反结算提交Json')
        },
        transDeleteReturn() {
            alert('交易反结算返回Json')
        },
    }
};
</script>
<style lang="scss" scoped>
</style>