<template>
  <div class="dashboard-container">
    <!-- <component :is="currentRole"/> -->
    <p style="text-align: center;margin-top: 10%;">
      惠好车接口列表
    </p>    
    <el-tabs style="margin:25px" v-model="activeName" type="card" @tab-click="handleClick">
        <el-tab-pane label="权限角色" name="first">
          <role-permission 
            ref="rolePermissionChild" 
            v-on:formatJs="formatJson"
            v-bind:dialogVisible="this.dialogVisible" 
            v-on:showDialog="showDialog($event)"
            v-bind:rInfo="this.rInfo"
            v-on:showJson="showJson($event)">
          </role-permission>
        </el-tab-pane>
        <el-tab-pane label="用户管理" name="second">
            <user
                v-on:formatJs="formatJson"
                v-bind:dialogVisible="this.dialogVisible" 
                v-on:showDialog="showDialog($event)"
                v-bind:rInfo="this.rInfo"
                v-on:showJson="showJson($event)">
            </user>                                 
        </el-tab-pane>
        <el-tab-pane label="门店管理" name="third">
            <shop></shop>  
        </el-tab-pane>
        <el-tab-pane label="公告管理" name="four">
           <notice></notice>
        </el-tab-pane>
        <el-tab-pane label="车源管理" name="five">
           <car></car>
        </el-tab-pane>
        <el-tab-pane label="求购管理" name="six">
           <want></want>
        </el-tab-pane>
        <el-tab-pane label="客户管理" name="seven">
           <customer></customer>
        </el-tab-pane>
        <el-tab-pane label="商机管理" name="eight">
            <opp></opp>
        </el-tab-pane>
        <el-tab-pane label="交易管理" name="nine">
           <trans></trans>
        </el-tab-pane>
        <el-tab-pane label="贷款管理" name="ten">
           <loan></loan>
        </el-tab-pane>
    </el-tabs>
    <el-dialog
      title="Json"
      :visible.sync="dialogVisible"
      width="30%"
      :before-close="handleClose">
      <span v-html="rInfo"></span>
   </el-dialog>
  </div>
</template>
<script>
import { mapGetters } from 'vuex'
import adminDashboard from './admin'
import editorDashboard from './editor'
import RolePermission from './json/RolePermission'
import User from './json/User'
import Shop from './json/Shop'
import Notice from './json/Notice'
import Car from './json/Car'
import Customer from './json/Customer'
import Loan from './json/Loan'
import Opp from './json/Opp'
import Trans from './json/Trans'
import Want from './json/Want'

export default {
    name: 'Dashboard',
    components: { 
        adminDashboard, 
        editorDashboard, 
        RolePermission,
        User, 
        Shop, 
        Notice, 
        Car,   
        Notice, 
        Customer, 
        Loan, 
        Opp, 
        Trans,
        Want, 
    },
    data() {
      return {
        currentRole: 'adminDashboard',
        dialogVisible: false,
        rInfo:'反正我告诉你了',
        activeName: 'second'
      }
    },
    computed: {
      ...mapGetters([
        'roles'
      ])
    },
    created() {
      if (!this.roles.includes('admin')) {
        this.currentRole = 'editorDashboard'
      }
    },
    methods: {
        handleClick(tab, event) {
            console.log(tab, event);
        },
        showDialog(status){
            this.dialogVisible = status;
        },
        showJson(data){
            this.rInfo = this.formatJson(data)
        },
        handleClose(done) {
           done();
         },
        formatJson(msg){
           var rep = "~"; 
           var jsonStr = JSON.stringify(msg, null, rep) 
           var str = ""; 
           for (var i = 0; i < jsonStr.length; i++) { 
               var text2 = jsonStr.charAt(i) 
               if (i > 1) { 
                   var text = jsonStr.charAt(i - 1) 
                   if (rep != text && rep == text2) {
                    str += "<br/>" 
                   } 
               } 
               str += text2; 
           } 
           jsonStr = ""; 
           for (var i = 0; i < str.length; i++) { 
               var text = str.charAt(i); 
               if (rep == text) 
                   jsonStr += "&nbsp;&nbsp;&nbsp;&nbsp;" 
               else { 
                   jsonStr += text; 
               } 
               if (i == str.length - 2) 
                   jsonStr += "<br/>" 
           } 
           return jsonStr
        },
    }
}
</script>
