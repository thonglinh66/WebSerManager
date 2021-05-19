<template>
<div class="content-wrapper">
    <div class="container  " style="width: 70%; padding-top: 5%">
    <div class="row">
  		<div class="col-sm-3" ><!--left col-->
              

      <div class="text-center" style="margin-right:20%">
        <img v-if="url" :src="url" class="avatar  img-thumbnail" alt="avatar">
        <h6>Upload a different photo...</h6>
        <input type="file" class="text-center center-block file-upload" @change="onFileChange">
      </div> <hr><br>

               
        
          
        </div><!--/col-3-->
    	<div class="col-sm-9">              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                  <form class="form"  id="registrationForm" @submit.prevent="addPost">
                      
                   

                       <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="code"><h4>MSSV</h4></label>
                              <input type="text" class="form-control" name="code" v-model="datas.mssv" @input="checkExist()" id="code" placeholder="MSSV" title="nhập MSSV.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="name"><h4>Họ và tên</h4></label>
                              <input type="text" class="form-control" name="name" v-model="datas.fullname" @input="checkExist()" id="name" placeholder="họ tên" title="nhập họ và tên.">
                          </div>
                      </div>
                    <div class="form-group">
                        <label for="code"><h4>Gioi tinh</h4></label>
                        <div class="row-xs-6">
                            <input type="radio" v-model="datas.sex" id="male" name="gender" v-bind:value="0">
                            <label style="margin-right:50px;margin-left:10px; font-size:20px" for="male">Nam</label> 
                            <input type="radio" v-model="datas.sex" id="female" name="gender" v-bind:value="1">
                            <label style="margin-right:50px;margin-left:10px; font-size:20px" for="female">Nữ</label><br>
                         </div>
                    </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="mail"><h4>Email</h4></label>
                              <input type="text" disabled="disabled" class="form-control" name="mail" v-model="datas.mail"  id="code" placeholder="@student.ctu.edu.vn" title="nhập mail.">
                          </div>
                      </div>
                     <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="address"><h4>Địa chỉ</h4></label>
                              <input type="text" class="form-control" name="address" v-model="datas.address" id="address" placeholder="nhập địa chỉ" title="nhập địa chỉ.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h4>Điện thoại</h4></label>
                              <input type="number" class="form-control" name="phone" v-model="datas.phone" id="phone" placeholder="nhập số điện thoại" title="nhập số điện thoại.">
                          </div>
                      </div>
                     <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="khoa"><h4>Khoa</h4></label>
                              <select v-model="datas.khoa" name="LeaveType" onchange="onChange(this.value)" class="form-control">
                                <option value="1">Công nghệ thông tin và truyền thông</option>
                                <option value="6">Nông nghiệp</option>
                              </select>
                          </div>
                      </div>
                       <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="khoa"><h4>Ngành</h4></label>
                              <select v-model="datas.nganh" name="LeaveType" onchange="onChange(this.value)" class="form-control">
                                <option v-if="this.datas.khoa == 1" value="1">Kỹ thuật phần mềm</option>
                                <option v-if="this.datas.khoa == 1" value="2">Công nghệ thông tin</option>

                                <option v-if="this.datas.khoa == 1" value="3">Khoa học máy tính</option>

                                <option v-if="this.datas.khoa == 1" value="4">Hệ thống thông tin</option>

                                <option v-if="this.datas.khoa == 1" value="5">Mạng máy tính</option>

                                <option v-if="this.datas.khoa == 6" value="6">Thú y</option>
                              </select>
                          </div>
                      </div>
                       <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="khoa"><h4>Lớp</h4></label>
                              <select v-model="datas.lop" name="LeaveType" onchange="onChange(this.value)" class="form-control">
                                <option v-if="this.datas.nganh == 1" value="1">A1</option>
                                <option v-if="this.datas.nganh == 1" value="2">A2</option>

                               <option v-if="this.datas.nganh == 2" value="3">A1</option>
                                <option v-if="this.datas.nganh == 2" value="4">A2</option>

                                 <option v-if="this.datas.nganh == 3" value="5">A1</option>
                                <option v-if="this.datas.nganh == 3" value="6">A2</option>

                                 <option v-if="this.datas.nganh == 4" value="7">A1</option>
                                <option v-if="this.datas.nganh == 4" value="8">A2</option>

                                 <option v-if="this.datas.nganh == 5" value="9">A1</option>
                                <option v-if="this.datas.nganh == 5" value="10">A2</option>

                                 <option v-if="this.datas.nganh == 6" value="11">A1</option>
                                <option v-if="this.datas.nganh == 6" value="12">A2</option>
                              </select>
                          </div>
                      </div>
                    <div class="form-group">
                          <div class="col-xs-6">
                              <label for="bown"><h4>Ngày sinh</h4></label><br>
                                <input type="date" v-model="datas.bown">
                          </div>
                      </div>

                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="diem"><h4>Điểm</h4></label>
                              <input type="number" min="0" max="50" class="form-control" name="diem" v-model="datas.diem" id="diem" placeholder="nhập điểm" title="nhập điểm thi.">
                          </div>
                      </div>
                     
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="k"><h4>Khóa</h4></label>
                              <select v-model="datas.k" name="LeaveType" onchange="onChange(this.value)" class="form-control">
                                  <option  value="1">43</option>
                                  <option  value="2">42</option>

                                  <option  value="3">41</option>

                                  <option  value="4">40</option>


                                  <option v-if="this.datas.khoa == 6" value="6">Thú y</option>
                              </select>                          </div>
                      </div>
                     
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Password</h4></label>
                              <input type="password" class="form-control" name="password" v-model="datas.password" id="password" placeholder="password" title="enter your password.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>Verify</h4></label>
                              <input type="password" class="form-control" name="password2" v-model="datas.password2"  id="password2" placeholder="password2" title="enter your password2.">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                               	<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                      </div>
              	</form>
              
              <hr>
              
          
              </div>
               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div>
</div>
</template>

<script>

export default {
    data() {
    return {
       url: "http://ssl.gstatic.com/accounts/ui/avatar_2x.png",
       datas:{
            sex : 0,
            file : ""
        },
    }
  },
  methods: {
    onFileChange(e) {
      this.datas.file = e.target.files[0];
      this.url = URL.createObjectURL(this.datas.file);
    },
    checkExist(){
        if(!(this.datas.fullname == undefined || this.datas.mssv == undefined)){
           var lastname =  this.datas.fullname.split(' ').slice(-1).join(' ').toLowerCase();
           lastname = lastname.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a"); 
           lastname = lastname.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e"); 
           lastname = lastname.replace(/ì|í|ị|ỉ|ĩ/g,"i"); 
           lastname = lastname.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o"); 
           lastname = lastname.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u"); 
           lastname = lastname.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y"); 
           lastname = lastname.replace(/đ/g,"d");
           lastname = lastname.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "A");
           lastname = lastname.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "E");
           lastname = lastname.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "I");
           lastname = lastname.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "O");
           lastname = lastname.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "U");
           lastname = lastname.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "Y");
           lastname = lastname.replace(/Đ/g, "D");
           var mssv  = this.datas.mssv.toLowerCase();
           this.datas.mail = lastname + mssv + "@student.ctu.edu.vn"
        }
    } ,
    addPost(){
     if(this.datas.file == undefined || this.datas.lop == undefined || this.datas.fullname == undefined ||this.datas.phone == undefined || this.datas.bown == undefined ||  this.datas.password == undefined ||this.datas.nganh == undefined ||this.datas.k == undefined ||this.datas.diem == undefined ||this.datas.password2  == undefined ||this.datas.khoa == undefined)
          {
             this.$toast.open({
                message: "Please Fill All data",
                type: "warning",
                duration: 1000,
                dismissible: true
              })
          }else{
            if(this.datas.password == this.datas.password2){
                console.log(this.datas)
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
                let formData = new FormData();
                formData.append('file', this.datas.file);
                formData.append('fullname', this.datas.fullname);
                formData.append('k', this.datas.k);
                formData.append('mssv', this.datas.mssv);
                formData.append('sex', this.datas.sex);
                formData.append('addess', this.datas.address);
                formData.append('mail', this.datas.mail);
                formData.append('diem', this.datas.diem);
                formData.append('password', this.datas.password);
                formData.append('phone', this.datas.phone);
                formData.append('bown', this.datas.bown);
                formData.append('lop', this.datas.lop);
              let uri = 'http://127.0.0.1:8000/api/post/upload';
              this.axios.post(uri, formData, config).then((response) => {
              console.log(response.data);
              this.$toast.open({
                message: response.data,
                type: "success",
                duration: 2000,
                dismissible: true
              })
              this.$router.push({path: '/home'});
              
              });
            }else{
                this.$toast.open({
                message: "Password incorrect",
                type: "error",
                duration: 1000,
                dismissible: true
              })
            }
          }
      }
  }
}
</script>