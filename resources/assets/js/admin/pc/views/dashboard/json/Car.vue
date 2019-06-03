<template>
    <div>
        <el-dropdown trigger="click">
            <el-button type="primary">
                车源列表<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="carListCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="carListReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                车源信息添加<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="carInfoAddCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="carInfoAddReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                车源图片添加<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="carImageAddCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="carImageAddReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                车源信息修改<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="carInfoUpdateCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="carInfoUpdateReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                车源图片修改<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="carImageUpdateCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="carImageUpdateReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                车源上/下架<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="carSaleOrUnsaleCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="carSaleOrUnsaleReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                车源详情<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="carShowCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="carShowReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                车源跟进<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="carTouchCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="carTouchReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                车源跟踪<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="carFollowCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="carFollowReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                车源评估<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="carPingGuCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="carPingGuReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                发起交易<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="carTransCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="carTransReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
    </div>
</template>
<script>
import { getCarList, getCarInfo, carTouch, carInfoAdd, carImageAdd, carInfoUpdate, carImageUpdate, carSaleOrUnsale, carFollow, carTrans, carPingGu, } from '@adminPc/api/car'
//import { parseTime } from '@/utils'
//import  { infoSelfStatus, jituanStatus, oldBindStatus, collections_type }  from '@/config.js'
import { TOKEN } from '@adminPc/tokenConfig.js'
export default {
    name: 'Car',
    data() {
        return {
            listQuery : {
                page: 1, //分页
                is_self: false, //是否自有车源
                is_show: '1',   //上/下架状态
                car_code: '',   //车源编号
                car_status: '', //车源状态
                gearbox: '',    //变速箱形式
                shop_id: '',    //所属门店id
                is_appraiser: '', //评估状态
                sale_number: '',  //过户次数
                out_color: '',   //外观颜色
                capacity: '',    //排量
                category_type: '',  //车源车辆类型(轿车,客车等)
                begin_mileage: '',    //行驶里程区间(开始)
                end_mileage: '',    //行驶里程区间(结束)
                top_price: '',    //价格区间(高)
                bottom_price: '',    //价格区间(低)
                begin_date: '',    //上传时间区间(开始)
                end_date: '',    //上传时间区间(结束)
                category_id: '',    //车源车辆车型(捷达等)
                category_id: '',    //车源车辆车型(捷达等)
            }
        };
    },
    created() {

    },
    methods: {
        carListCommit() {
            /*const listQuery = {
                page: 1, //分页
                is_self: false, //是否自有车源
                is_show: '1',   //上/下架状态
                car_code: '',   //车源编号
                car_status: '', //车源状态
                gearbox: '',    //变速箱形式
                shop_id: '',    //所属门店id
                is_appraiser: '', //评估状态
                sale_number: '',  //过户次数
                out_color: '',   //外观颜色
                capacity: '',    //排量
                category_type: '',  //车源车辆类型(轿车,客车等)
                begin_mileage: '',    //行驶里程区间(开始)
                end_mileage: '',    //行驶里程区间(结束)
                top_price: '',    //价格区间(高)
                bottom_price: '',    //价格区间(低)
                begin_date: '',    //上传时间区间(开始)
                end_date: '',    //上传时间区间(结束)
                category_id: '',    //车源车辆车型(捷达等)
                category_id: '',    //车源车辆车型(捷达等)
            }*/
            this.$emit("showJson", this.listQuery)
            this.$emit("showDialog", true)
        },
        carListReturn() {
            /*const listQuery = this.listQuery
            console.log(listQuery)
            return false*/
            getCarList(this.listQuery).then(response => {
                console.log(response.data)
                // return false
                const carList = response.data

                this.$emit("showJson", carList)
                this.$emit("showDialog", true)
            })
        },
        carInfoAddCommit() {
            alert('车源信息添加提交Json')
        },
        carInfoAddReturn() {
            alert('车源信息添加返回Json')
        },
        carImageAddCommit() {
            alert('车源图片添加提交Json')
        },
        carImageAddReturn() {
            alert('车源图片添加返回Json')
        },
        carInfoUpdateCommit() {
            alert('车源信息修改提交Json')
        },
        carInfoUpdateReturn() {
            alert('车源信息修改返回Json')
        },
        carImageUpdateCommit() {
            alert('车源图片修改提交Json')
        },
        carImageUpdateReturn() {
            alert('车源图片修改返回Json')
        },
        carSaleOrUnsaleCommit() {
            alert('车源上/下架提交Json')
        },
        carSaleOrUnsaleReturn() {
            alert('车源上/下架返回Json')
        },
        carShowCommit() {
            alert('车源详情提交Json')
        },
        carShowReturn() {
            alert('车源详情返回Json')
        },
        carTouchCommit() {
            alert('车源跟进提交Json')
        },
        carTouchReturn() {
            alert('车源跟进返回Json')
        },
        carFollowCommit() {
            alert('车源跟踪提交Json')
        },
        carFollowReturn() {
            alert('车源跟踪返回Json')
        },
        carTransCommit() {
            alert('车源交易提交Json')
        },
        carTransReturn() {
            alert('车源交易返回Json')
        },
        carPingGuCommit() {
            alert('车源评估提交Json')
        },
        carPingGuReturn() {
            alert('车源评估返回Json')
        },
    }
};
</script>
<style lang="scss" scoped>
</style>