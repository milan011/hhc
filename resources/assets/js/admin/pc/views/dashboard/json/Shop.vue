<template>
    <div>
     <el-dropdown trigger="click">
                <el-button type="primary">
                  门店列表<i class="el-icon-arrow-down el-icon--right"></i>
                </el-button>
                <el-dropdown-menu slot="dropdown">
                    <el-dropdown-item icon="el-icon-plus">
                       <el-button type="primary" @click="shopListCommit" >提交Json</el-button>
                    </el-dropdown-item>
                    <el-dropdown-item icon="el-icon-circle-plus">
                        <el-button type="primary" @click="shopListReturn" >返回Json</el-button>
                    </el-dropdown-item>
                </el-dropdown-menu>
            </el-dropdown>
            <el-dropdown trigger="click">
                <el-button type="primary">
                  门店添加<i class="el-icon-arrow-down el-icon--right"></i>
                </el-button>
                <el-dropdown-menu slot="dropdown">
                    <el-dropdown-item icon="el-icon-plus">
                       <el-button type="primary" @click="shopAddCommit" >提交Json</el-button>
                    </el-dropdown-item>
                    <el-dropdown-item icon="el-icon-circle-plus">
                        <el-button type="primary" @click="shopAddReturn" >返回Json</el-button>
                    </el-dropdown-item>
                </el-dropdown-menu>
            </el-dropdown>
            <el-dropdown trigger="click">
                <el-button type="primary">
                  门店修改<i class="el-icon-arrow-down el-icon--right"></i>
                </el-button>
                <el-dropdown-menu slot="dropdown">
                    <el-dropdown-item icon="el-icon-plus">
                       <el-button type="primary" @click="shopUpdateCommit" >提交Json</el-button>
                    </el-dropdown-item>
                    <el-dropdown-item icon="el-icon-circle-plus">
                        <el-button type="primary" @click="shopUpdateReturn" >返回Json</el-button>
                    </el-dropdown-item>
                </el-dropdown-menu>
            </el-dropdown>
            <el-dropdown trigger="click">
                <el-button type="primary">
                  门店删除<i class="el-icon-arrow-down el-icon--right"></i>
                </el-button>
                <el-dropdown-menu slot="dropdown">
                    <el-dropdown-item icon="el-icon-plus">
                       <el-button type="primary" @click="shopDeleteCommit" >提交Json</el-button>
                    </el-dropdown-item>
                    <el-dropdown-item icon="el-icon-circle-plus">
                        <el-button type="primary" @click="shopDeleteReturn" >返回Json</el-button>
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
    name: 'Shop',
    data() {
      return {

      };
    },
    created() {   
      
    },
    methods: {
      shopListCommit(){
        alert('门店列表提交Json')
      },
      shopListReturn(){
        alert('门店列表返回Json')
      },
      shopAddCommit(){
        alert('门店添加提交Json')
      },
      shopAddReturn(){
        alert('门店添加返回Json')
      },
      shopUpdateCommit(){
        alert('门店修改提交Json')
      },
      shopUpdateReturn(){
        alert('门店修改返回Json')
      },
      shopDeleteCommit(){
        alert('门店删除提交Json')
      },
      shopDeleteReturn(){
        alert('门店删除返回Json')
      },
    }
  };
</script>
<style lang="scss" scoped>
  
</style>