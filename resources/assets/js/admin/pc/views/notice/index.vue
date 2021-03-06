<template>
    <div class="app-container">
        <div class="filter-container">
            <el-button class="filter-item" style="margin-left: 10px;" type="primary" icon="el-icon-edit" @click="handleCreate">
                {{ $t('table.add') }}
            </el-button>
        </div>
        <el-table v-loading="listLoading" :key="tableKey" :data="list" border fit highlight-current-row style="width: 100%;">
            <el-table-column :label="$t('table.id')" width="80%" align="center">
                <template slot-scope="scope">
                    <span>{{ scope.row.id }}</span>
                </template>
            </el-table-column>
            <el-table-column :label="$t('notice.title')" show-overflow-tooltip align="center">
                <template slot-scope="scope">
                    <span>{{ scope.row.title }}</span>
                </template>
            </el-table-column>
            <el-table-column :label="$t('table.date')" width="150px" align="center">
                <template slot-scope="scope">
                    <span>
                        {{ scope.row.created_at | parseTime('{y}-{m}-{d}') }}
                        |
                        <span>{{scope.row.belongs_to_user.nick_name}}</span>
                    </span>
                </template>
            </el-table-column>
            <el-table-column :label="$t('table.actions')" align="center" width="230" class-name="small-padding fixed-width">
                <template slot-scope="scope">
                    <el-button type="primary" size="mini" @click="handleUpdate(scope.row)">{{ $t('table.edit') }}</el-button>
                    <el-button type="success" size="mini" @click="handleShow(scope.row)">{{ $t('table.show') }}</el-button>
                    <el-button v-if="scope.row.status!='deleted'" size="mini" type="danger" @click="handleModifyStatus(scope.row,'deleted')">{{ $t('table.delete') }}
                    </el-button>
                </template>
            </el-table-column>
        </el-table>
        <div class="pagination-container">
            <el-pagination v-show="total>0" :current-page="listQuery.page" :total="total" background layout="total, prev, pager, next" @current-change="handleCurrentChange" />
        </div>
        <el-dialog :title="textMap[dialogStatus]" :visible.sync="dialogFormVisible">
            <el-form ref="dataForm" :rules="rules" :model="temp" label-position="right" label-width="100px" style="width: 100%;">
                <el-form-item :label="$t('notice.title')" prop="title">
                    <el-input v-model="temp.title" />
                </el-form-item>
                <el-form-item :label="$t('notice.content')" prop="content">
                    <div class="editor-container">
                        <Tinymce :height=300 v-model="temp.content" /></Tinymce>
                    </div>
                </el-form-item>
            </el-form>
            <div slot="footer" class="dialog-footer">
                <el-button @click="dialogFormVisible = false">{{ $t('table.cancel') }}</el-button>
                <el-button v-if="dialogStatus=='create'" type="primary" @click="createData">{{ $t('table.confirm') }}</el-button>
                <el-button v-else type="primary" @click="updateData">{{ $t('table.confirm') }}</el-button>
            </div>
        </el-dialog>
        <el-dialog title="公告详情" :visible.sync="dialogInfoVisible">
            <el-row>
                <el-col :span="24">
                    <div class="grid-content bg-purple-dark self-style">
                        <span>{{ noticeInfo.title }}</span>
                    </div>
                </el-col>
            </el-row>
            <el-row>
                <el-col :span="12">
                    <div class="grid-content bg-purple self-style">
                        <span>{{noticeInfo.belongs_to_user.nick_name}}</span>
                    </div>
                </el-col>
                <el-col :span="12">
                    <div  class="grid-content bg-purple self-style">
                        <span>{{noticeInfo.created_at}}</span></div>
                </el-col>
            </el-row>
            <el-row >
                <el-col  :span="24">
                    <div class="grid-content self-style">
                        <span style="text-align:left" v-html="noticeInfo.content"></span>
                    </div>
                </el-col>
            </el-row>
        </el-dialog>
    </div>
</template>
<script>
// import { fetchList, fetchPv, createPermission, updatePermission, deletePermission } from '@/api/permission'
// import { packageList, createPackage, getPackage, updatePackage, deletePackage } from '@/api/package'
import '@adminPc/static/tinymce4.7.5/tinymce.min.js'
import Tinymce from '@adminPc/components/Tinymce/index'
import { noticeList, createNotice, getNotice, updateNotice, deleteNotice } from '@adminPc/api/notice'
import waves from '@adminPc/directive/waves' // 水波纹指令
import { parseTime } from '@adminPc/utils'
import { isTelephone } from '@adminPc/utils/validate'

const calendarTypeOptions = [
    { key: 'web', display_name: 'web' },
    { key: 'api', display_name: 'api' },
]

// arr to obj ,such as { CN : "China", US : "USA" }
const calendarTypeKeyValue = calendarTypeOptions.reduce((acc, cur) => {
    acc[cur.key] = cur.display_name
    return acc
}, {})

export default {
    name: 'noticeList',
    components: { Tinymce },
    directives: {
        waves
    },
    filters: {
        noticeStatusFilter(status) {
            const statusMap = {
                1: 'success',
                0: 'danger'
            }
            return statusMap[status]
        },
        typeFilter(type) {
            return calendarTypeKeyValue[type]
        }
    },
    data() {
        const validateReturnMonthPrice = (rule, value, callback) => { /*密码确认校验*/
            console.log(value)
            return false
        }
        const validateTelephone = (rule, value, callback) => {
            if (!isTelephone(value)) {
                callback(new Error('请输入正确格式手机号'))
            } else {
                callback()
            }
        }
        return {
            tableKey: 0,
            list: null,
            total: null,
            listLoading: true,
            listQuery: {
                page: 1,
            },
            // cityList: cityHasTcl,
            calendarTypeOptions,
            showReviewer: false,
            temp: {
                id: undefined,
                title: '',
                content: '',
                belongs_to_user: { nick_name: null },
            },
            noticeInfo: {
                id: undefined,
                title: '',
                content: '',
                belongs_to_user: { nick_name: null },
            },
            dialogFormVisible: false,
            // noticeStatusMap: noticeStatus,
            // noticeTypeMap: noticeType,
            dialogInfoVisible: false,
            dialogStatus: '',
            textMap: {
                update: '编辑公告',
                create: '新增公告'
            },
            rules: {
                title: [{ required: true, message: '请输入标题', trigger: 'blur' }],
                content: [{ required: true, message: '输入内容', trigger: 'blur' }],
                /*type: [{ required: true, message: '请选择类别', trigger: 'blur' }],
                address: [{ required: true, message: '请输入地址', trigger: 'blur' }],
                telephone: [
                  { required: true, message: '请输入有效手机号', trigger: 'blur' }, 
                  { validator: validateTelephone, trigger: 'change' }     
                ]*/
            },
            downloadLoading: false
        }
    },
    created() {
        this.getNoticeList()
    },
    methods: {
        getNoticeList() {
            this.listLoading = true
            noticeList(this.listQuery).then(response => {
                this.list = response.data.Data.data
                this.total = response.data.Data.total
                // console.log(this.list)
                // Just to simulate the time of the request
                setTimeout(() => {
                    this.listLoading = false
                }, 1.5 * 1000)
            })
        },
        handleFilter() {
            this.listQuery.page = 1
            this.getNoticeList()
        },
        handleSizeChange(val) {
            this.listQuery.limit = val
            this.getNoticeList()
        },
        handleCurrentChange(val) {
            this.listQuery.page = val
            this.getNoticeList()
        },
        handleModifyStatus(row, status) {
            this.$confirm('确定要停用该公告?', '提示', {
                confirmButtonText: '确定',
                cancelButtonText: '取消',
                type: 'warning'
            }).then(() => {
                this.temp = Object.assign({}, row)
                deleteNotice(this.temp).then((response) => {
                    // console.log(response.data);
                    if (response.data.status === 0) {
                        this.$notify({
                            title: '失败',
                            message: '停用失败',
                            type: 'warning',
                            duration: 2000
                        })
                    } else {
                        const index = this.list.indexOf(row)
                        this.list.splice(index, 1)
                        this.dialogFormVisible = false
                        this.$notify({
                            title: '成功',
                            message: '停用成功',
                            type: 'success',
                            duration: 2000
                        })
                    }
                })
            }).catch(() => {
                this.$message({
                    type: 'info',
                    message: '已取消删除'
                });
            });
        },
        resetTemp() {
            /*this.temp = {
              id: undefined,
              title: '',      
              content: '',   
            }*/
            this.temp = {
                id: undefined,
                title: '又一个公告',
                content: '大家都来淘车乐买车/卖车啊',
            }
        },
        handleCreate() {
            this.resetTemp()
            this.dialogStatus = 'create'
            this.dialogFormVisible = true
            this.$nextTick(() => {
                this.$refs['dataForm'].clearValidate()
            })
        },
        createData() {
            console.log(this.temp)
            // return false
            this.$refs['dataForm'].validate((valid) => {
                if (valid) {
                    createNotice(this.temp).then((response) => {
                        console.log(response.data.data);
                        // console.log(this.temp)
                        //return false
                        const returnData = response.data
                        if (returnData.ResultType == 0) {
                            let noticeData = returnData.Data
                            this.list.unshift(noticeData)
                            this.dialogFormVisible = false
                            this.$notify({
                                title: '成功',
                                message: returnData.message,
                                type: 'success',
                                duration: 2000
                            })
                        } else {
                            this.$notify.error({
                                title: '失败',
                                message: returnData.message,
                                duration: 2000
                            })
                        }
                    })
                }
            })
        },
        handleShow(row) {
            // console.log(row.has_many_package_info)
            this.noticeInfo = Object.assign({}, row) // copy obj
            console.log(this.noticeInfo)
            this.dialogInfoVisible = true

        },
        handleUpdate(row) {
            // console.log(row)
            this.temp = Object.assign({}, row) // copy obj
            console.log(this.temp)
            // return false
            this.dialogStatus = 'update'
            this.dialogFormVisible = true
        },
        updateData() {
            this.$refs['dataForm'].validate((valid) => {
                if (valid) {
                    const tempData = Object.assign({}, this.temp)
                    updateNotice(tempData).then((response) => {
                        console.log(response.data)
                        const returnData = response.data
                        if (returnData.ResultType == 0) {
                            for (const v of this.list) {
                                if (v.id === this.temp.id) {
                                    const index = this.list.indexOf(v)
                                    this.list.splice(index, 1, returnData.Data)
                                    break
                                }
                            }
                            this.dialogFormVisible = false
                            this.$notify({
                                title: '成功',
                                message: returnData.Mssage,
                                type: 'success',
                                duration: 2000
                            })
                        } else {
                            this.$notify.error({
                                title: '失败',
                                message: returnData.Mssage,
                                duration: 2000
                            })
                        }
                    })
                }
            })
        },
    }
}
</script>
<style rel="stylesheet/scss" lang="scss" scoped>
@import "@adminPc/styles/mixin.scss";

.el-dialog__body {
    padding: 15px 15px;
}

.el-dialog__header {
    padding-top: 10px;
}

.el-row {
    margin-bottom: 5px;

    &:last-child {
        margin-bottom: 0;
    }
}

.el-col {
    border-radius: 4px;
}

.bg-purple-dark {
    background: #99a9bf;
}

.bg-purple {
    background: #d3dce6;
}

.bg-purple-light {
    background: #e5e9f2;
}

.grid-content {
    border-radius: 4px;
    min-height: 36px;
}

.row-bg {
    padding: 10px 0;
    background-color: #f9fafc;
}

.self-style {
    text-align: -webkit-center;
    font-size: 20px;
    padding: 10px 0px;
}

.el-cascader-menu {
    height: auto;
    border-right: solid 0px #e4e7ed;
}
</style>