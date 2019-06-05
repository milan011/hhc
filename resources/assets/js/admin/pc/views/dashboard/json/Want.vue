<template>
    <div>
        <el-dropdown trigger="click">
            <el-button type="primary">
                求购列表<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="wantListCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="wantListReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                求购信息添加<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="wantAddCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="wantAddReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                求购信息修改<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="wantUpdateCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="wantUpdateReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                求购上/下架<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="wantSaleOrUnsaleCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="wantSaleOrUnsaleReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                求购详情<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="wantShowCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="wantShowReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                求购跟进<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="wantTouchCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="wantTouchReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                求购跟踪<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="wantFollowCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="wantFollowReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                发起交易<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="wantTransCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="wantTransReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
    </div>
</template>
<script>
import { getWantList, getWantInfo, wantTouch, wantInfoAdd, wantInfoUpdate, wantSaleOrUnsale, wantFollow, wantTrans, } from '@adminPc/api/want'
//import { parseTime } from '@/utils'
//import  { infoSelfStatus, jituanStatus, oldBindStatus, collections_type }  from '@/config.js'
import { TOKEN } from '@adminPc/tokenConfig.js'
export default {
    name: 'Want',
    data() {
        return {
            wantData: {
                want_code: '', //编号
                is_self: false, //是否自有求购
                want_status: null, //求购状态
                shop_id: null, //所属门店
                price: { //价格区间
                    begin: '',
                    end: '',
                },
                gearbox: null, //变速箱
                category_name: null, //车系(捷达等)
            },
            pageQuery: {
                page: 1, //分页
            }
        };
    },
    created() {

    },
    methods: {
        wantListCommit() {
            const listQuery = Object.assign(this.pageQuery, this.wantData)

            this.$emit("showJson", listQuery)
            this.$emit("showDialog", true)
        },
        wantListReturn() {
            const listQuery = Object.assign(this.pageQuery, this.wantData)
            getWantList(listQuery).then(response => {
                console.log(response.data)
                // return false
                const carList = response.data

                this.$emit("showJson", carList)
                this.$emit("showDialog", true)
            })
        },
        wantAddCommit() {
            const wantData = {
                'id': undefined,
                'categorey_name': 'POLO', //期望车系
                'shop_id': '38', //所属门店
                'alternate_car': '捷达', //备选车系
                'alternate_car_another': '速腾', //备选车系
                'gearbox': '1', //变速箱
                'bottom_price': '95', //期望价格
                'xs_remark': '想买车', //求购描述
            }
            this.$emit("showJson", wantData)
            this.$emit("showDialog", true)
        },
        wantAddReturn() {

            const wantData = {
                'id': undefined,
                'categorey_name': 'POLO', //期望车系
                'alternate_car': '捷达', //备选车系
                'alternate_car_another': '速腾', //备选车系
                'shop_id': '38', //所属门店
                'gearbox': '1', //变速箱
                'bottom_price': '95', //期望价格
                'xs_remark': '想买车', //求购描述
            }
            wantInfoAdd(wantData).then(response => {
                console.log(response.data)
                // return false
                const carList = response.data

                this.$emit("showJson", carList)
                this.$emit("showDialog", true)
            })
        },
        wantUpdateCommit() {
            alert('求购信息修改提交Json')
        },
        wantUpdateReturn() {
            alert('求购信息修改返回Json')
        },
        wantSaleOrUnsaleCommit() {
            alert('求购上/下架提交Json')
        },
        wantSaleOrUnsaleReturn() {
            alert('求购上/下架返回Json')
        },
        wantShowCommit() {
            alert('求购详情提交Json')
        },
        wantShowReturn() {
            alert('求购详情返回Json')
        },
        wantTouchCommit() {
            alert('求购跟进提交Json')
        },
        wantTouchReturn() {
            alert('求购跟进返回Json')
        },
        wantFollowCommit() {
            alert('求购跟踪提交Json')
        },
        wantFollowReturn() {
            alert('求购跟踪返回Json')
        },
        wantTransCommit() {
            alert('求购交易提交Json')
        },
        wantTransReturn() {
            alert('求购交易返回Json')
        },
    }
};
</script>
<style lang="scss" scoped>
</style>