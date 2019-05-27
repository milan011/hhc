<template>
    <div>
     <el-dropdown trigger="click">
                <el-button type="primary">
                  交易列表<i class="el-icon-arrow-down el-icon--right"></i>
                </el-button>
                <el-dropdown-menu slot="dropdown">
                    <el-dropdown-item icon="el-icon-plus">
                       <el-button type="primary" @click="transListCommit" >提交Json</el-button>
                    </el-dropdown-item>
                    <el-dropdown-item icon="el-icon-circle-plus">
                        <el-button type="primary" @click="transListReturn" >返回Json</el-button>
                    </el-dropdown-item>
                </el-dropdown-menu>
            </el-dropdown>
            <el-dropdown trigger="click">
                <el-button type="primary">
                  交易详情<i class="el-icon-arrow-down el-icon--right"></i>
                </el-button>
                <el-dropdown-menu slot="dropdown">
                    <el-dropdown-item icon="el-icon-plus">
                       <el-button type="primary" @click="transShowCommit" >提交Json</el-button>
                    </el-dropdown-item>
                    <el-dropdown-item icon="el-icon-circle-plus">
                        <el-button type="primary" @click="transShowReturn" >返回Json</el-button>
                    </el-dropdown-item>
                </el-dropdown-menu>
            </el-dropdown>
            <el-dropdown trigger="click">
                <el-button type="primary">
                  交易修改<i class="el-icon-arrow-down el-icon--right"></i>
                </el-button>
                <el-dropdown-menu slot="dropdown">
                    <el-dropdown-item icon="el-icon-plus">
                       <el-button type="primary" @click="transUpdateCommit" >提交Json</el-button>
                    </el-dropdown-item>
                    <el-dropdown-item icon="el-icon-circle-plus">
                        <el-button type="primary" @click="transUpdateReturn" >返回Json</el-button>
                    </el-dropdown-item>
                </el-dropdown-menu>
            </el-dropdown>
            <el-dropdown trigger="click">
                <el-button type="primary">
                  交易反结算<i class="el-icon-arrow-down el-icon--right"></i>
                </el-button>
                <el-dropdown-menu slot="dropdown">
                    <el-dropdown-item icon="el-icon-plus">
                       <el-button type="primary" @click="transDeleteCommit" >提交Json</el-button>
                    </el-dropdown-item>
                    <el-dropdown-item icon="el-icon-circle-plus">
                        <el-button type="primary" @click="transDeleteReturn" >返回Json</el-button>
                    </el-dropdown-item>
                </el-dropdown-menu>
            </el-dropdown>
    </div>
</template>
<script>
  //import { getInfo } from '@/api/infoSelf'
  //import { parseTime } from '@/utils'
  //import  { infoSelfStatus, jituanStatus, oldBindStatus, collections_type }  from '@/config.js'
  export default {
    name: 'Trans',
    data() {
      return {

      };
    },
    created() {   
      
    },
    methods: {
      transListCommit(){
        alert('交易列表提交Json')
      },
      transListReturn(){
        alert('交易列表返回Json')
      },
      transAddCommit(){
        alert('交易添加提交Json')
      },
      transAddReturn(){
        alert('交易添加返回Json')
      },
      transShowCommit(){
        alert('交易详情提交Json')
      },
      transShowReturn(){
        alert('交易详情返回Json')
      },
      transUpdateCommit(){
        alert('交易修改提交Json')
      },
      transUpdateReturn(){
        alert('交易修改返回Json')
      },
      transDeleteCommit(){
        alert('交易反结算提交Json')
      },
      transDeleteReturn(){
        alert('交易反结算返回Json')
      },
    }
  };
</script>
<style lang="scss" scoped>
  
</style>