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
            carData: {
                Code: 'SH_20190103132946_1', //编号
                VIN: null, //vin码
                PlateNum: null, //车牌
                FullName: null, //车源名称
                Factory: null, //品牌
                CarModel: null, //车型
                CarType: null, //类型(小型,中型)
                CarYear: null, //年限(准新车,三年,五年)
                ImportType: null, //国产,合资,进口
                Emission: null, //排放标准
                Transmission: null, //变速箱形式
                Capacity: null, //排量
                //合法性状态（0：未开始，1：录入关键信息2：拍摄图片3：证件验证）4：性能检测完成5：价值评估完成
                Status: null,
                SaleAMT: null, //期望销售价格
                Shop_Id: null, //所属门店id
                Customer_Id: null, //对应客户id
                Car_Status: null, //车源状态0：废弃1：正常：2：交易
                Pg_description: null, //评估师描述
                XS_description: null, //销售描述
                Sale_number: null, //过户次数
                Safe_end: null, //保险到期时间
                Safe_type: null, //保险类别
                Inside_color: null, //内饰颜色
                Out_color: null, //外观颜色
                Mileage: null, //行驶里程
                is_self: false, //是否自有车源
                Is_Show: null, //上/下架状态
            },
            pageQuery: {
                page: 1, //分页
            }
        };
    },
    created() {

    },
    methods: {
        carListCommit() {
            const listQuery = Object.assign(this.pageQuery, this.carData)
            // this.listQuery.query = this.carData
            /*console.log(this.listQuery)
            return false*/
            this.$emit("showJson", listQuery)
            this.$emit("showDialog", true)
        },
        carListReturn() {
            this.carData.Code = ''
            const listQuery = Object.assign(this.pageQuery, this.carData)
            getCarList(listQuery).then(response => {
                console.log(response.data)
                // return false
                const carList = response.data

                this.$emit("showJson", carList)
                this.$emit("showDialog", true)
            })
        },
        carInfoAddCommit() {
            const carInfo = {
                "ID": undefined,
                "Code": "SH_20190409125306_18",
                "VIN": "LVSFCAMEX8F265694",
                "Area": "苏J",
                "PlateNum": "苏JAY888",
                "BuyDate": "1900-01-01 00:00:00",
                "FullName": "福克斯 两厢 2007款 1.8L MT 舒适版",
                "Factory": "长安福特",
                "CarModel": "福克斯 两厢",
                "CarType": "紧凑型车",
                "CarYear": "准新车",
                "InitPrice": "12.38",
                "ImportType": "国产",
                "MakeDate": null,
                "Emission": "国IV",
                "Transmission": "手动变速器",
                "Capacity": "1.8L",
                "CapacityNum": 0,
                "Status": 3,
                "EvalAMT": "12",
                "HfEvalById": 18,
                "XnEvalById": 18,
                "XnDate": "2019-04-09 12:53:48",
                "JzEvalById": 18,
                "EvalDate": "2019-04-09 12:54:10",
                "SaleAMT": "5.00",
                "IsSaled": 0,
                "SaledAMT": "0.00",
                "SaledDate": null,
                "IsPutOn": 0,
                "PutOnDate": "2019-04-09 12:54:30",
                "PutDownDate": null,
                "Depreciate": "0",
                "UserKind": 1,
                "IsSchool": 1,
                "CreateDate": "2019-04-09 12:53:07",
                "UpdateDate": "2019-04-09 12:53:07",
                "IsDeleted": 0,
                "IsCase": 1,
                "AddCaseTime": "2019-05-14 11:43:10",
                "FromCaseType": 1,
                "CaseUserId": "18",
                "CaseUserName": "111",
                "CaseCarId": null,
                "Shop_Id": null,
                "CreateId": null,
                "Customer_Id": null,
                "Is_Top": null,
                "Is_Show": null,
                "Recommend": null,
                "Car_Status": "1",
                "Pg_description": "",
                "XS_description": null,
                "Description": null,
                "Sale_number": 0,
                "Safe_end": "",
                "Safe_type": "1",
                "Out_color": "3",
                "Inside_color": null,
                "AuditStatus": null,
            }

            this.$emit("showJson", carInfo)
            this.$emit("showDialog", true)
        },
        carInfoAddReturn() {
            const carInfo = {
                "ID": undefined,
                "Code": "SH_20190409125306_18",
                "VIN": "LVSFCAME28F262624",
                "Area": "苏J",
                "PlateNum": "苏JAY888",
                "BuyDate": "1900-01-01 00:00:00",
                "FullName": "福克斯 两厢 2007款 1.8L MT 舒适版",
                "Factory": "长安福特",
                "CarModel": "福克斯 两厢",
                "CarType": "紧凑型车",
                "CarYear": "准新车",
                "InitPrice": "12.38",
                "ImportType": "国产",
                "MakeDate": null,
                "Emission": "国IV",
                "Transmission": "手动变速器",
                "Capacity": "1.8L",
                "CapacityNum": 0,
                "Status": 3,
                "EvalAMT": "12",
                "HfEvalById": 18,
                "XnEvalById": 18,
                "XnDate": "2019-04-09 12:53:48",
                "JzEvalById": 18,
                "EvalDate": "2019-04-09 12:54:10",
                "SaleAMT": "5.00",
                "IsSaled": 0,
                "SaledAMT": "0.00",
                "SaledDate": null,
                "IsPutOn": 0,
                "PutOnDate": "2019-04-09 12:54:30",
                "PutDownDate": null,
                "Depreciate": "0",
                "UserKind": 1,
                "IsSchool": 1,
                "CreateDate": "2019-04-09 12:53:07",
                "UpdateDate": "2019-04-09 12:53:07",
                "IsDeleted": 0,
                "IsCase": 1,
                "AddCaseTime": "2019-05-14 11:43:10",
                "FromCaseType": 1,
                "CaseUserId": "18",
                "CaseUserName": "111",
                "CaseCarId": null,
                "Shop_Id": null,
                "CreateId": null,
                "Customer_Id": null,
                "Is_Top": null,
                "Is_Show": null,
                "Recommend": null,
                "Car_Status": "1",
                "Pg_description": "",
                "XS_description": null,
                "Description": null,
                "Sale_number": 0,
                "Safe_end": "",
                "Safe_type": "1",
                "Out_color": "3",
                "Inside_color": null,
                "AuditStatus": null,
            }
            carInfoAdd(carInfo).then(response => {
                // console.log(response.data)
                // return false
                const car = response.data

                this.$emit("showJson", car)
                this.$emit("showDialog", true)
            })
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