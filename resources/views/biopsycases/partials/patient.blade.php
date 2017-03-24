    <div class="panel panel-default panel-theme">
        <div class="panel-heading panel-theme"><label>Patient Data</label></div>
        <div class="panel-body">
{{-- 
            
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="HN">HN :</label>
                    <input class="form-control" type="text" name="HN" readonly>
                </div>
            </div>
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="patient_name">Name :</label>
                    <input class="form-control" type="text" name="patient_name" readonly>
                </div>
            </div>
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="gender">Gender :</label>
                    <input class="form-control" type="text" name="gender" readonly>
                </div>
            </div>
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="dob">Date of Birth :</label>
                    <input class="form-control" type="text" name="dob" readonly>
                </div>
            </div>
             
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="address">Currently Address :</label>
                    <input class="form-control" type="text" name="address">
                </div>
            </div>
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="postcode_id">Postcode :</label>
                    <input class="form-control" type="text" name="postcode_id">
                </div>
            </div>
            --}}

            <!-- field is_black datatype byte -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="is_black">Race :</label>
                    <label class="radio-inline"><input type="radio" name="is_black" value="0" {{ isInputChecked($case->is_black,0) }}> non Black</label>
                    <label class="radio-inline"><input type="radio" name="is_black" value="1" {{ isInputChecked($case->is_black,1) }}> Black</label>
                </div>
            </div>

            <div class="col-sm-12 col-xs-12"><hr/></div>

            <!-- field birth_place_id datatype byte -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="birth_place_id">Birth place : <span class="fa fa-sort-alpha-asc"></span></label>
                    <select class="form-control" name="birth_place_id">
                        <option selected disabled hidden value=""></option>
                        <option value="99" {{ isInputChecked($case->birth_place_id,99,'s') }}>Other</option>
                        <option value="81" {{ isInputChecked($case->birth_place_id,81,'s') }}>กระบี่</option>
                        <option value="10" {{ isInputChecked($case->birth_place_id,10,'s') }}>กรุงเทพมหานคร</option>
                        <option value="71" {{ isInputChecked($case->birth_place_id,71,'s') }}>กาญจนบุรี</option>
                        <option value="46" {{ isInputChecked($case->birth_place_id,46,'s') }}>กาฬสินธุ์</option>
                        <option value="62" {{ isInputChecked($case->birth_place_id,62,'s') }}>กำแพงเพชร</option>
                        <option value="40" {{ isInputChecked($case->birth_place_id,40,'s') }}>ขอนแก่น</option>
                        <option value="22" {{ isInputChecked($case->birth_place_id,22,'s') }}>จันทบุรี</option>
                        <option value="24" {{ isInputChecked($case->birth_place_id,24,'s') }}>ฉะเชิงเทรา</option>
                        <option value="20" {{ isInputChecked($case->birth_place_id,20,'s') }}>ชลบุรี</option>
                        <option value="18" {{ isInputChecked($case->birth_place_id,18,'s') }}>ชัยนาท</option>
                        <option value="36" {{ isInputChecked($case->birth_place_id,36,'s') }}>ชัยภูมิ</option>
                        <option value="86" {{ isInputChecked($case->birth_place_id,86,'s') }}>ชุมพร</option>
                        <option value="57" {{ isInputChecked($case->birth_place_id,57,'s') }}>เชียงราย</option>
                        <option value="50" {{ isInputChecked($case->birth_place_id,50,'s') }}>เชียงใหม่</option>
                        <option value="92" {{ isInputChecked($case->birth_place_id,92,'s') }}>ตรัง</option>
                        <option value="23" {{ isInputChecked($case->birth_place_id,23,'s') }}>ตราด</option>
                        <option value="63" {{ isInputChecked($case->birth_place_id,63,'s') }}>ตาก</option>
                        <option value="26" {{ isInputChecked($case->birth_place_id,26,'s') }}>นครนายก</option>
                        <option value="73" {{ isInputChecked($case->birth_place_id,73,'s') }}>นครปฐม</option>
                        <option value="48" {{ isInputChecked($case->birth_place_id,48,'s') }}>นครพนม</option>
                        <option value="30" {{ isInputChecked($case->birth_place_id,30,'s') }}>นครราชสีมา</option>
                        <option value="80" {{ isInputChecked($case->birth_place_id,80,'s') }}>นครศรีธรรมราช</option>
                        <option value="60" {{ isInputChecked($case->birth_place_id,60,'s') }}>นครสวรรค์</option>
                        <option value="12" {{ isInputChecked($case->birth_place_id,12,'s') }}>นนทบุรี</option>
                        <option value="96" {{ isInputChecked($case->birth_place_id,96,'s') }}>นราธิวาส</option>
                        <option value="55" {{ isInputChecked($case->birth_place_id,55,'s') }}>น่าน</option>
                        <option value="31" {{ isInputChecked($case->birth_place_id,31,'s') }}>บุรีรัมย์</option>
                        <option value="13" {{ isInputChecked($case->birth_place_id,13,'s') }}>ปทุมธานี</option>
                        <option value="77" {{ isInputChecked($case->birth_place_id,77,'s') }}>ประจวบคีรีขันธ์</option>
                        <option value="25" {{ isInputChecked($case->birth_place_id,25,'s') }}>ปราจีนบุรี</option>
                        <option value="94" {{ isInputChecked($case->birth_place_id,94,'s') }}>ปัตตานี</option>
                        <option value="14" {{ isInputChecked($case->birth_place_id,14,'s') }}>พระนครศรีอยุธยา</option>
                        <option value="56" {{ isInputChecked($case->birth_place_id,56,'s') }}>พะเยา</option>
                        <option value="82" {{ isInputChecked($case->birth_place_id,82,'s') }}>พังงา</option>
                        <option value="93" {{ isInputChecked($case->birth_place_id,93,'s') }}>พัทลุง</option>
                        <option value="66" {{ isInputChecked($case->birth_place_id,66,'s') }}>พิจิตร</option>
                        <option value="65" {{ isInputChecked($case->birth_place_id,65,'s') }}>พิษณุโลก</option>
                        <option value="76" {{ isInputChecked($case->birth_place_id,76,'s') }}>เพชรบุรี</option>
                        <option value="67" {{ isInputChecked($case->birth_place_id,67,'s') }}>เพชรบูรณ์</option>
                        <option value="54" {{ isInputChecked($case->birth_place_id,54,'s') }}>แพร่</option>
                        <option value="83" {{ isInputChecked($case->birth_place_id,83,'s') }}>ภูเก็ต</option>
                        <option value="44" {{ isInputChecked($case->birth_place_id,44,'s') }}>มหาสารคาม</option>
                        <option value="49" {{ isInputChecked($case->birth_place_id,49,'s') }}>มุกดาหาร</option>
                        <option value="58" {{ isInputChecked($case->birth_place_id,58,'s') }}>แม่ฮ่องสอน</option>
                        <option value="35" {{ isInputChecked($case->birth_place_id,35,'s') }}>ยโสธร</option>
                        <option value="95" {{ isInputChecked($case->birth_place_id,95,'s') }}>ยะลา</option>
                        <option value="45" {{ isInputChecked($case->birth_place_id,45,'s') }}>ร้อยเอ็ด</option>
                        <option value="85" {{ isInputChecked($case->birth_place_id,85,'s') }}>ระนอง</option>
                        <option value="21" {{ isInputChecked($case->birth_place_id,21,'s') }}>ระยอง</option>
                        <option value="70" {{ isInputChecked($case->birth_place_id,70,'s') }}>ราชบุรี</option>
                        <option value="16" {{ isInputChecked($case->birth_place_id,16,'s') }}>ลพบุรี</option>
                        <option value="52" {{ isInputChecked($case->birth_place_id,52,'s') }}>ลําปาง</option>
                        <option value="51" {{ isInputChecked($case->birth_place_id,51,'s') }}>ลำพูน</option>
                        <option value="42" {{ isInputChecked($case->birth_place_id,42,'s') }}>เลย</option>
                        <option value="33" {{ isInputChecked($case->birth_place_id,33,'s') }}>ศรีสะเกษ</option>
                        <option value="47" {{ isInputChecked($case->birth_place_id,47,'s') }}>สกลนคร</option>
                        <option value="90" {{ isInputChecked($case->birth_place_id,90,'s') }}>สงขลา</option>
                        <option value="91" {{ isInputChecked($case->birth_place_id,91,'s') }}>สตูล</option>
                        <option value="11" {{ isInputChecked($case->birth_place_id,11,'s') }}>สมุทรปราการ</option>
                        <option value="75" {{ isInputChecked($case->birth_place_id,75,'s') }}>สมุทรสงคราม</option>
                        <option value="74" {{ isInputChecked($case->birth_place_id,74,'s') }}>สมุทรสาคร</option>
                        <option value="27" {{ isInputChecked($case->birth_place_id,27,'s') }}>สระแก้ว</option>
                        <option value="19" {{ isInputChecked($case->birth_place_id,19,'s') }}>สระบุรี</option>
                        <option value="17" {{ isInputChecked($case->birth_place_id,17,'s') }}>สิงห์บุรี</option>
                        <option value="64" {{ isInputChecked($case->birth_place_id,64,'s') }}>สุโขทัย</option>
                        <option value="72" {{ isInputChecked($case->birth_place_id,72,'s') }}>สุพรรณบุรี</option>
                        <option value="84" {{ isInputChecked($case->birth_place_id,84,'s') }}>สุราษฎร์ธานี</option>
                        <option value="32" {{ isInputChecked($case->birth_place_id,32,'s') }}>สุรินทร์</option>
                        <option value="43" {{ isInputChecked($case->birth_place_id,43,'s') }}>หนองคาย</option>
                        <option value="39" {{ isInputChecked($case->birth_place_id,39,'s') }}>หนองบัวลำภู</option>
                        <option value="15" {{ isInputChecked($case->birth_place_id,15,'s') }}>อ่างทอง</option>
                        <option value="37" {{ isInputChecked($case->birth_place_id,37,'s') }}>อำนาจเจริญ</option>
                        <option value="41" {{ isInputChecked($case->birth_place_id,41,'s') }}>อุดรธานี</option>
                        <option value="53" {{ isInputChecked($case->birth_place_id,53,'s') }}>อุตรดิตถ์</option>
                        <option value="61" {{ isInputChecked($case->birth_place_id,61,'s') }}>อุทัยธานี</option>
                        <option value="34" {{ isInputChecked($case->birth_place_id,34,'s') }}>อุบลราชธานี</option>
                    </select>
                </div>
            </div>

            <!-- field education_id datatype byte -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="education_id">Highest education : </label>
                    <select class="form-control" name="education_id">
                        <option selected disabled hidden value=""></option>
                        <option {{ isInputChecked($case->education_id,0,'s') }} value="0">ไม่ได้เรียน</option>
                        <option {{ isInputChecked($case->education_id,1,'s') }} value="1">ประถมศึกษา</option>
                        <option {{ isInputChecked($case->education_id,2,'s') }} value="2">มัธยมศึกษา</option>
                        <option {{ isInputChecked($case->education_id,3,'s') }} value="3">อนุปริญญา</option>
                        <option {{ isInputChecked($case->education_id,4,'s') }} value="4">ปริญญาตรี</option>
                        <option {{ isInputChecked($case->education_id,5,'s') }} value="5">ปริญญาโท</option>
                        <option {{ isInputChecked($case->education_id,6,'s') }} value="6">ปริญญาเอก</option>
                        <option {{ isInputChecked($case->education_id,7,'s') }} value="7">สูงกว่าปริญญาเอก</option>
                        <option {{ isInputChecked($case->education_id,99,'s') }} value="99">อื่น ๆ</option>
                    </select>
                </div>
            </div>

            <!-- field career_id datatype byte -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="career_id">Career : </label>
                    <select class="form-control" name="career_id">
                        <option selected disabled hidden value=""></option>
                        <option  {{ isInputChecked($case->career_id,0,'s') }} value="0">ว่างงาน</option>
                        <option  {{ isInputChecked($case->career_id,1,'s') }} value="1">รับราชการ</option>
                        <option  {{ isInputChecked($case->career_id,2,'s') }} value="2">ข้าราชการบำนาญ</option>
                        <option  {{ isInputChecked($case->career_id,3,'s') }} value="3">รัฐวิสาหกิจ</option>
                        <option  {{ isInputChecked($case->career_id,4,'s') }} value="4">บำนาญรัฐวิสาหกิจ</option>
                        <option  {{ isInputChecked($case->career_id,5,'s') }} value="5">ธุรกิจส่วนตัว</option>
                        <option  {{ isInputChecked($case->career_id,6,'s') }} value="6">รับจ้าง</option>
                        <option  {{ isInputChecked($case->career_id,99, 's') }} value="99">อื่น ๆ</option>
                    </select>
                </div>
            </div>

            <!-- field name datatype string -->
            {{-- 
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                  <label for="name"></label>  
                </div>
            </div>
 --}}
            <!-- field tel_no datatype string -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="tel_no">Phone Numbers :</label>
                    <input class="form-control" type="text" name="tel_no" value="{{ $case->tel_no }}">
                </div>
            </div>
            <!-- field alternative_contact datatype string -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="alternative_contact">Alternative Contact Person :</label>
                    <input class="form-control" type="text" name="alternative_contact" value="{{ $case->alternative_contact }}">
                </div>
            </div>
        </div>
    </div>