<template>
<div class="content-wrapper" style="margin-bottom:50px">
<section class="content">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Detail</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><router-link to="/home">Home</router-link></li>
              <li class="breadcrumb-item active">Detail</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div>
    </section><!-- /.container-fluid -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="white-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                                <div class="container-fluid">
                                    <div class="col">
                                        <div class="row-sm">
                                           <div class="full-card">
                                                <div class="head-card">
                                                    <div class="logo-card">
                                                    </div>
                                                    <div class="title-card">
                                                        TRƯỜNG ĐẠI HỌC CẦN THƠ <br>KHOA CNTT VÀ TRUYỀN THÔNG
                                                    </div>
                                                </div>
                                                <div class="body-card">
                                                    <div class="img-card"  v-bind:style="{ 'background-image': 'url(' + this.datas[0].avatar + ')' }"></div>
                                                    <div class="detail-card">
                                                        <div class="type-card">SINH VIÊN</div>
                                                        <div class="fullname-card">{{this.datas[0].fullName}}</div>
                                                        <div class="code-card">{{this.datas[0].username}}</div>
                                                        <div class="branch-card">Ngành: <b>{{this.datas[0].branchName}}</b></div>
                                                        <div class="course-card">Khóa học: <b>{{this.datas[0].K}}</b> ({{this.datas[0].starYear}}-{{parseInt(this.datas[0].starYear) + parseInt(Math.ceil(this.datas[0].years)) - 1}})</div>
                                                        <div class="web-card">www.ctu.edu.vn</div>
                                                    </div>
                                                </div>
                                            </div>
                                 
                                        </div>
                                        <div class="row-sm">
                                            <div class="content-profile">
                                                <table width="96%" height="100%" border="0" cellpadding="0" cellspacing="0" align="center" style=" margin-bottom: 25px;">
                                                    <tbody><tr>
                                                        <td height="100%" valign="top">
                                                        <form name="frmThongTin" method="post">
                                                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                            <tbody><tr>
                                                            <td class="main_1_left">  </td>
                                                            <td class="main_1" align="center"> </td>
                                                            <td class="main_1_right">  </td>
                                                            </tr>
                                                            <tr> 
                                                            <td colspan="3" align="left">		 
                                                            <table width="100%" class="border_1" bordercolor="#111111"  cellspacing="0" cellpadding="0" align="center" border="0" style="border-bottom:none">		  						
                                                                    <tbody><tr>
                                                                    <td align="left" valign="top" class="main_3" style="border:none">&nbsp;THÔNG TIN CHI TIẾT </td>
                                                                    </tr>				
                                                                </tbody></table>										
                                                                <table width="100%" class="border_1" bordercolor="#111111" cellspacing="0" cellpadding="0" align="center" border="0">
                                                                <tbody><tr>
                                                                    <td width="21%" height="22" align="right" class="level_1_1">Mã số sinh viên </td>
                                                                    <td width="24%" align="left" class="level_1_1">
                                                                        <strong>{{this.datas[0].username}}</strong> </td>
                                                                    <td width="23%" colspan="-1" align="right" class="level_1_1">Họ và tên </td>
                                                                    <td align="left" class="level_1_1">
                                                                        <strong>{{this.datas[0].fullName}}</strong> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="22" align="right" class="level_1_2">Phái</td>
                                                                    <td align="left" class="level_1_2">
                                                                    <span v-if="this.datas[0].sex == 0">Nam</span>
                                                                    <span v-if="this.datas[0].sex == 1">Nữ</span>
                                                                    <td colspan="-1" align="right" class="level_1_2">Ngày sinh</td>
                                                                    <td align="left" valign="middle" class="level_1_2"><strong>{{this.datas[0].birthDay}}</strong>&nbsp;				</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="21%" height="22" align="right" class="level_1_1">Tôn giáo</td>
                                                                    <td align="left" class="level_1_1"><strong>{{this.datas[0].religion}} </strong>&nbsp;                </td>
                                                                    <td width="23%" colspan="-1" align="right" class="level_1_1">Dân tộc</td>
                                                                    <td align="left" class="level_1_1"><strong>{{this.datas[0].nation}}</strong>&nbsp;                </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="22" align="right" class="level_1_2">Lớp</td>
                                                                    <td align="left" class="level_1_2"><strong>{{this.datas[0].branchName + ' - '+ this.datas[0].name}}</strong>&nbsp;</td>
                                                                    <td colspan="-1" align="right" class="level_1_2">Khoa</td>
                                                                    <td align="left" class="level_1_2"><strong>{{this.datas[0].facultyName}}</strong>&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="21%" height="22" align="right" class="level_1_1">Chuyên ngành</td>
                                                                    <td align="left" class="level_1_1"><strong>{{this.datas[0].branchName }}</strong>&nbsp;</td>
                                                                    <td width="23%" colspan="-1" align="right" class="level_1_1">Hệ đào tạo</td>
                                                                    <td align="left" class="level_1_1"><strong>Đại học - Chính quy</strong>&nbsp;</td>
                                                                </tr>
                                                            
                                                                <tr>
                                                                    <td width="21%" height="22" align="right" class="level_1_2">Chứng minh nhân dân</td>
                                                                    <td align="left" class="level_1_2"><strong>{{this.datas[0].indentity }}</strong>&nbsp;</td>
                                                                    <td width="23%" colspan="-1" align="right" class="level_1_2">Email</td>
                                                                    <td align="left" class="level_1_2"><strong>{{this.datas[0].mail }}</strong>&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    
                                                                    <td colspan="-1" align="right" class="level_1_1">Địa chỉ liên lạc</td>
                                                                    <!--<td align="left" class="level_1_2"><strong></strong>&nbsp;</td>-->
                                                                    <td align="left" class="level_1_1">
                                                                        <strong> {{this.datas[0].address}}  </strong>&nbsp;
                                                                    </td>
                                                                    <td colspan="-1" align="right" class="level_1_1">Số điện thoại</td>
                                                                    <td align="left" class="level_1_1">
                                                                        <strong> {{this.datas[0].phone}}</strong>&nbsp;                 </td>
                                                                </tr>
                                                               
                                                                <tr>
                                                                    <td colspan="-1" align="right" class="level_1_2">&nbsp;</td>
                                                                    <td align="left" class="level_1_2">&nbsp;</td>
                                                                    <td height="22" align="right" class="level_1_2">&nbsp;</td>
                                                                    <td height="22" align="left" class="level_1_2">&nbsp;</td>
                                                                </tr>
                                                                </tbody>
                                                                </table>
                                                            </td>
                                                            </tr>
                                                    
                                                        
                                                                
                                                    </tbody>
                                                    </table>
                                                        </form>
                                                        </td>
                                                        </tr>
                                                        </tbody>
                                                        </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </section>
</div>
</template>
<style>
        .content-profile{
            margin-top: 50px;
            border: 1px solid black;
            border-radius: 20px;
            background-color: white;
            padding-left: 40px;
        }
        .full-card{
            width: 450px;
            height: 300px;
            background-color: white;
            border: 1px solid black;
            margin: 0 auto;
        }
        .head-card{
            display: inline-block;
            width: 100%;
            height: 25%;
            background-color: orange;
        }
        .logo-card{
            float:left;
            width: 100px;
            height: 100px;
            margin-left: 20px;
            background-image: url('/admin/lte/images/Ctu.png');
            background-size: 70px ;
            background-repeat: no-repeat;
        }
        .title-card{
            margin-top: 8px;
            width: 70%;
            float: left;
            height: 100%;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }
        .body-card{
            width: 100%;
            height: 75%;
            display: flex;
        }
        .img-card{
            margin: 0 0 4px 4px;
            width: 35%;
            height: 100% ;
            background-size: 150px 200px ;
            background-repeat: no-repeat;
        }
        .detail-card{
            margin-left: 10px;
            width: 65%;
        }
        .type-card{
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .fullname-card{
            font-size: 20px;
            font-weight: bold;
            color: rgb(43, 83, 194);
            margin-bottom: 10px;
        }
        .code-card{
            font-size: 18px;
            font-weight: bold;
            color: rgb(255, 0, 0);
            margin-bottom: 10px;
        }
        .branch-card{
            font-size: 18px;
            margin-bottom: 10px;
        }
        .course-card{
            font-size: 18px;
            margin-bottom: 10px;
        }
        .web-card{
            float: right;
            margin: 10px 10px 0 0 ;
        }
</style>
<script>
    import moment from 'moment'
    export default {
        data() {
            return{
                datas:[],
            }
        },
        created(){
           this.refreshData()
        },
        props: ['studentId'],
        methods:{
            refreshData () {
                let uri = `http://127.0.0.1:8000/api/post/detail/${localStorage.getItem('temp')}`;
                this.axios.get(uri).then(response => {
                    this.datas = response.data;
                });
            },
            
        }

    };
</script>