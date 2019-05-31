<template>
    <div>
        <el-dropdown trigger="click">
            <el-button type="primary">
                公告列表<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="noticeListCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="noticeListReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                公告添加<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="noticeAddCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="noticeAddReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                公告修改<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="noticeUpdateCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="noticeUpdateReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                公告详情<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="noticeShowCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="noticeShowReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
        <el-dropdown trigger="click">
            <el-button type="primary">
                公告删除<i class="el-icon-arrow-down el-icon--right"></i>
            </el-button>
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item icon="el-icon-plus">
                    <el-button type="primary" @click="noticeDeleteCommit">提交Json</el-button>
                </el-dropdown-item>
                <el-dropdown-item icon="el-icon-circle-plus">
                    <el-button type="primary" @click="noticeDeleteReturn">返回Json</el-button>
                </el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
    </div>
</template>
<script>
import { noticeList, createNotice, getNotice, updateNotice, deleteNotice } from '@adminPc/api/notice'
//import { parseTime } from '@/utils'
//import  { infoSelfStatus, jituanStatus, oldBindStatus, collections_type }  from '@/config.js'
import { TOKEN } from '@adminPc/tokenConfig.js'
export default {
    name: 'Notice',
    data() {
        return {

        };
    },
    created() {

    },
    methods: {
        noticeListCommit() {
            const listQuery = {
                token: TOKEN,
                page: 1,
            }
            this.$emit("showJson", listQuery)
            this.$emit("showDialog", true)
        },
        noticeListReturn() {
            const listQuery = {
                token: TOKEN,
                page: 1,
            }
            noticeList(listQuery).then(response => {
                console.log(response.data)
                // return false
                const noticeList = response.data

                this.$emit("showJson", noticeList)
                this.$emit("showDialog", true)
            })
        },
        noticeAddCommit() {
            const noticeData = {
                title: '又一个公告',      
                content: '大家都来淘车乐买车/卖车啊', 
            }
            this.$emit("showJson", noticeData)
            this.$emit("showDialog", true)
        },
        noticeAddReturn() {
            const noticeData = {
                title: '又一个公告',      
                content: '大家都来淘车乐买车/卖车啊', 
            }
            createNotice(noticeData).then(response => {
                // console.log(response.data)
                // return false
                const notice = response.data

                this.$emit("showJson", notice)
                this.$emit("showDialog", true)
            })
        },
        noticeUpdateCommit() {
            const noticeData = {
                id: 5,
                title: '又一个公告',      
                content: '大家都来淘车乐买车/卖车啊', 
            }
            this.$emit("showJson", noticeData)
            this.$emit("showDialog", true)
        },
        noticeUpdateReturn() {
            const noticeData = {
                id: 5,
                title: '又一个公告222',      
                content: '大家都来淘车乐买车/卖车啊2222', 
            }
            updateNotice(noticeData).then(response => {
                // console.log(response.data)
                // return false
                const notice = response.data

                this.$emit("showJson", notice)
                this.$emit("showDialog", true)
            })
        },
        noticeDeleteCommit() {
            const commitData = {
                token: TOKEN,
                id: 12,
            }
            this.$emit("showJson", commitData)
            this.$emit("showDialog", true)
        },
        noticeDeleteReturn() {
            const commitData = {
                token: TOKEN,
                id: 5,
            }
            deleteNotice(commitData).then(response => {
                /*console.log(response.data)
                return false*/
                const deNotice = response.data

                this.$emit("showJson", deNotice)
                this.$emit("showDialog", true)
            })
        },
        noticeShowCommit() {
            const commitData = {
                token: TOKEN,
                id: 5,
            }
            this.$emit("showJson", commitData)
            this.$emit("showDialog", true)
        },
        noticeShowReturn() {
            const commitData = {
                token: TOKEN,
                id: 4,
            }
            getNotice(commitData).then(response => {
                /*console.log(response.data)
                return false*/
                const notice = response.data

                this.$emit("showJson", notice)
                this.$emit("showDialog", true)
            })
        },
    }
};
</script>
<style lang="scss" scoped>
</style>