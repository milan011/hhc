<template>
    <div>
     <el-dropdown trigger="click">
                <el-button type="primary">
                  商机列表<i class="el-icon-arrow-down el-icon--right"></i>
                </el-button>
                <el-dropdown-menu slot="dropdown">
                    <el-dropdown-item icon="el-icon-plus">
                       <el-button type="primary" @click="oppListCommit" >提交Json</el-button>
                    </el-dropdown-item>
                    <el-dropdown-item icon="el-icon-circle-plus">
                        <el-button type="primary" @click="oppListReturn" >返回Json</el-button>
                    </el-dropdown-item>
                </el-dropdown-menu>
            </el-dropdown>
            <el-dropdown trigger="click">
                <el-button type="primary">
                  商机添加<i class="el-icon-arrow-down el-icon--right"></i>
                </el-button>
                <el-dropdown-menu slot="dropdown">
                    <el-dropdown-item icon="el-icon-plus">
                       <el-button type="primary" @click="oppAddCommit" >提交Json</el-button>
                    </el-dropdown-item>
                    <el-dropdown-item icon="el-icon-circle-plus">
                        <el-button type="primary" @click="oppAddReturn" >返回Json</el-button>
                    </el-dropdown-item>
                </el-dropdown-menu>
            </el-dropdown>
            <el-dropdown trigger="click">
                <el-button type="primary">
                  商机修改<i class="el-icon-arrow-down el-icon--right"></i>
                </el-button>
                <el-dropdown-menu slot="dropdown">
                    <el-dropdown-item icon="el-icon-plus">
                       <el-button type="primary" @click="oppUpdateCommit" >提交Json</el-button>
                    </el-dropdown-item>
                    <el-dropdown-item icon="el-icon-circle-plus">
                        <el-button type="primary" @click="oppUpdateReturn" >返回Json</el-button>
                    </el-dropdown-item>
                </el-dropdown-menu>
            </el-dropdown>
            <el-dropdown trigger="click">
                <el-button type="primary">
                  商机删除<i class="el-icon-arrow-down el-icon--right"></i>
                </el-button>
                <el-dropdown-menu slot="dropdown">
                    <el-dropdown-item icon="el-icon-plus">
                       <el-button type="primary" @click="oppDeleteCommit" >提交Json</el-button>
                    </el-dropdown-item>
                    <el-dropdown-item icon="el-icon-circle-plus">
                        <el-button type="primary" @click="oppDeleteReturn" >返回Json</el-button>
                    </el-dropdown-item>
                </el-dropdown-menu>
            </el-dropdown>
            <el-dropdown trigger="click">
                <el-button type="primary">
                  商机分发<i class="el-icon-arrow-down el-icon--right"></i>
                </el-button>
                <el-dropdown-menu slot="dropdown">
                    <el-dropdown-item icon="el-icon-plus">
                       <el-button type="primary" @click="oppAssignCommit" >提交Json</el-button>
                    </el-dropdown-item>
                    <el-dropdown-item icon="el-icon-circle-plus">
                        <el-button type="primary" @click="oppAssignReturn" >返回Json</el-button>
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
    name: 'Opp',
    data() {
      return {

      };
    },
    created() {   
      
    },
    methods: {
      oppListCommit(){
        alert('商机列表提交Json')
      },
      oppListReturn(){
        alert('商机列表返回Json')
      },
      oppAddCommit(){
        alert('商机添加提交Json')
      },
      oppAddReturn(){
        alert('商机添加返回Json')
      },
      oppUpdateCommit(){
        alert('商机修改提交Json')
      },
      oppUpdateReturn(){
        alert('商机修改返回Json')
      },
      oppDeleteCommit(){
        alert('商机删除提交Json')
      },
      oppDeleteReturn(){
        alert('商机删除返回Json')
      },
      oppAssignCommit(){
        alert('商机分发提交Json')
      },
      oppAssignReturn(){
        alert('商机分发返回Json')
      }
    }
  };
</script>
<style lang="scss" scoped>
  
</style>