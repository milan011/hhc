<template>
    <div>
        <el-dropdown trigger="click">
            <el-button type="primary">
                贷款列表<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="loanListCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="loanListReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                贷款添加<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="loanAddCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="loanAddReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                贷款详情<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="loanUpdateCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="loanUpdateReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                贷款修改<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="loanUpdateCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="loanUpdateReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                贷款删除<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="loanDeleteCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="loanDeleteReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
    </div>
</template>
<script>
import { getLoanList, getLoanInfo, loanAdd, loanUpdate, deleteLoan } from '@adminPc/api/loan'
//import { parseTime } from '@/utils'
//import  { infoSelfStatus, jituanStatus, oldBindStatus, collections_type }  from '@/config.js'
import { TOKEN } from '@adminPc/tokenConfig.js'
export default {
    name: 'Loan',
    data() {
        return {
            loanData: {
                loan_code: '', //贷款编号
                name: '', //客户姓名
                telephone: '', //客户电话
                created_at: '', //创建时间
                loan_status: '', //分发门店
            },
            pageQuery: {
                page: 1, //分页
            }
        };
    },
    created() {
        this.listQuery = Object.assign(this.pageQuery, this.loanData)
    },
    methods: {
        loanListCommit() {
            this.$emit("showJson", this.listQuery)
            this.$emit("showDialog", true)
        },
        loanListReturn() {
            getLoanList(this.listQuery).then(response => {
                console.log(response.data)
                // return false
                const transactionList = response.data

                this.$emit("showJson", transactionList)
                this.$emit("showDialog", true)
            })
        },
        loanAddCommit() {
            const data = {
                "id": undefined,
                "name": "新客户",
                "card": "6259 0613 1631 8424",
                "bill_day": 19,
                "telephone": "15176924814",
                "car_name": "传祺GS8 2017款 320T 两驱豪华智联版 ",
                "cate": "5917",
                "category": "458",
                "appraiser_price": "13.800",
                "loan_price": "8.000",
                "insurance_loan": "0.000",
                "orther_loan": "0.630",
                "total_loan": "8.630",
                "loan_deposit": "0.000",
                "loan_phase": 36,
                "loan_date": "2018-12-21",
                "repayment_frist": "2713.0",
                "repayment_everymonth": "2685.0",
                "loan_begin_date": "2018-12-11",
                "car_plate_old": "",
                "car_plate_new": "冀AU26Q1",
                "other_contact1": "",
                "other_contact2": "",
                "other_contact1_phone": "",
                "other_contact2_phone": "",
                "recognizor": "",
                "recognizor_adress": "",
                "recognizor_phone": "",
                "plate_date": "2018-12-03",
                "appraiser_cost": "1000.000",
                "poundage": "1200.000",
                "qm_profits": "0.000",
                "loan_profits": "1200.000",
                "visits_profits": "500.000",
                "loan_channels": "1",
                "customer_sorcue": "灵寿店客户",
                "customer_id": 7308,
                "loan_status": "1",
                "insurance_status": "1",
                "remark": "二手车贷款",
                "creater_id": 98,
                "insurance_provence": 10,
                "insurance_city": 138,
            }
            this.$emit("showJson", data)
            this.$emit("showDialog", true)
        },
        loanAddReturn() {
          const data = {
                "id": undefined,
                "name": "新客户",
                "card": "6259 0613 1631 8424",
                "bill_day": 19,
                "telephone": "15176924814",
                "car_name": "传祺GS8 2017款 320T 两驱豪华智联版 ",
                "cate": "5917",
                "category": "458",
                "appraiser_price": "13.800",
                "loan_price": "8.000",
                "insurance_loan": "0.000",
                "orther_loan": "0.630",
                "total_loan": "8.630",
                "loan_deposit": "0.000",
                "loan_phase": 36,
                "loan_date": "2018-12-21",
                "repayment_frist": "2713.0",
                "repayment_everymonth": "2685.0",
                "loan_begin_date": "2018-12-11",
                "car_plate_old": "",
                "car_plate_new": "冀AU26Q1",
                "other_contact1": "",
                "other_contact2": "",
                "other_contact1_phone": "",
                "other_contact2_phone": "",
                "recognizor": "",
                "recognizor_adress": "",
                "recognizor_phone": "",
                "plate_date": "2018-12-03",
                "appraiser_cost": "1000.000",
                "poundage": "1200.000",
                "qm_profits": "0.000",
                "loan_profits": "1200.000",
                "visits_profits": "500.000",
                "loan_channels": "1",
                "customer_sorcue": "灵寿店客户",
                "customer_id": 7308,
                "loan_status": "1",
                "insurance_status": "1",
                "remark": "二手车贷款",
                "creater_id": 98,
                "insurance_provence": 10,
                "insurance_city": 138,
            }
            loanAdd(data).then(response => {
                console.log(response.data)
                // return false
                const loan = response.data

                this.$emit("showJson", loan)
                this.$emit("showDialog", true)
            })
        },
        loanUpdateCommit() {
            alert('贷款修改提交Json')
        },
        loanUpdateReturn() {
            alert('贷款修改返回Json')
        },
        loanDeleteCommit() {
            alert('贷款删除提交Json')
        },
        loanDeleteReturn() {
            alert('贷款删除返回Json')
        },
    }
};
</script>
<style lang="scss" scoped>
</style>