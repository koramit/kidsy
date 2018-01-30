<!-- field ward_id datatype smallInt -->
<div class="col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="ward_id">Ward : <span class="fa fa-sort-alpha-asc"></span></label>
        <select class="form-control" name="ward_id">
            <option selected disabled hidden value=""></option>
            <option {{ isInputChecked($case->ward_id,1 ,'s' )}} value='1'>72/5 ตะวันตก (The heart)</option>
            <option {{ isInputChecked($case->ward_id,2 ,'s' )}} value='2'>72/5 ตะวันออก (The heart)</option>
            <option {{ isInputChecked($case->ward_id,3 ,'s' )}} value='3'>72/6 ตะวันตก</option>
            <option {{ isInputChecked($case->ward_id,4 ,'s' )}} value='4'>72/6 ตะวันออก</option>
            <option {{ isInputChecked($case->ward_id,5 ,'s' )}} value='5'>72/7 ชายใต้</option>
            <option {{ isInputChecked($case->ward_id,6 ,'s' )}} value='6'>72/7 ชายเหนือ</option>
            <option {{ isInputChecked($case->ward_id,7 ,'s' )}} value='7'>72/7 หญิง</option>
            <option {{ isInputChecked($case->ward_id,8 ,'s' )}} value='8'>72/8 ตะวันตก</option>
            <option {{ isInputChecked($case->ward_id,9 ,'s' )}} value='9'>72/8 ตะวันออก</option>
            <option {{ isInputChecked($case->ward_id,10,'s') }} value='10'>72/9 ชายตะวันออก</option>
            <option {{ isInputChecked($case->ward_id,11,'s') }} value='11'>72/9 หญิงตะวันออก</option>
            <option {{ isInputChecked($case->ward_id,12,'s') }} value='12'>84 ชั้น 2 ตะวันตก (KT)</option>
            <option {{ isInputChecked($case->ward_id,13,'s') }} value='13'>84/10 ตะวันตก</option>
            <option {{ isInputChecked($case->ward_id,14,'s') }} value='14'>84/10 ตะวันออก</option>
            <option {{ isInputChecked($case->ward_id,15,'s') }} value='15'>84/3 ตตจ.2</option>
            <option {{ isInputChecked($case->ward_id,16,'s') }} value='16'>84/5 ตะวันตก</option>
            <option {{ isInputChecked($case->ward_id,17,'s') }} value='17'>84/5 ตะวันออก</option>
            <option {{ isInputChecked($case->ward_id,18,'s') }} value='18'>84/6 ตะวันตก</option>
            <option {{ isInputChecked($case->ward_id,19,'s') }} value='19'>84/6 ตะวันออก</option>
            <option {{ isInputChecked($case->ward_id,20,'s') }} value='20'>84/7 ตะวันตก</option>
            <option {{ isInputChecked($case->ward_id,21,'s') }} value='21'>84/7 ตะวันออก</option>
            <option {{ isInputChecked($case->ward_id,22,'s') }} value='22'>84/8 ตะวันตก</option>
            <option {{ isInputChecked($case->ward_id,23,'s') }} value='23'>84/8 ตะวันออก</option>
            <option {{ isInputChecked($case->ward_id,24,'s') }} value='24'>84/9 ตะวันตก</option>
            <option {{ isInputChecked($case->ward_id,25,'s') }} value='25'>84/9 ตะวันออก</option>
            <option {{ isInputChecked($case->ward_id,26,'s') }} value='26'>ฉก10 ใต้</option>
            <option {{ isInputChecked($case->ward_id,27,'s') }} value='27'>ฉก15 ทองคำเมฆโต(แยกโรค)</option>
            <option {{ isInputChecked($case->ward_id,28,'s') }} value='28'>ฉก16</option>
            <option {{ isInputChecked($case->ward_id,29,'s') }} value='29'>ฉก7 ใต้</option>
            <option {{ isInputChecked($case->ward_id,30,'s') }} value='30'>ฉก7 เหนือ</option>
            <option {{ isInputChecked($case->ward_id,31,'s') }} value='31'>ไตเทียม</option>
            <option {{ isInputChecked($case->ward_id,33,'s') }} value='33'>จธ.11 (ปาวา2)</option>
            <option {{ isInputChecked($case->ward_id,34,'s') }} value='34'>จธ.12 (ปาวา3)</option>
            <option {{ isInputChecked($case->ward_id,32,'s') }} value='32'>จธ.13 (หรจ. เดิม ปกส3)</option>
            <option {{ isInputChecked($case->ward_id,35,'s') }} value='35'>ผะอบ 5</option>
            <option {{ isInputChecked($case->ward_id,36,'s') }} value='36'>พิเศษ</option>
            <option {{ isInputChecked($case->ward_id,37,'s') }} value='37'>มว.1</option>
            <option {{ isInputChecked($case->ward_id,38,'s') }} value='38'>มว2</option>
            <option {{ isInputChecked($case->ward_id,39,'s') }} value='39'>วธ3</option>
            <option {{ isInputChecked($case->ward_id,40,'s') }} value='40'>อัษฏางค์ 10 ใต้</option>
            <option {{ isInputChecked($case->ward_id,41,'s') }} value='41'>อัษฏางค์ 10 เหนือ</option>
            <option {{ isInputChecked($case->ward_id,42,'s') }} value='42'>อัษฏางค์ 11 ใต้</option>
            <option {{ isInputChecked($case->ward_id,43,'s') }} value='43'>อัษฏางค์ 11 เหนือ</option>
            <option {{ isInputChecked($case->ward_id,44,'s') }} value='44'>อัษฏางค์ 12 ใต้</option>
            <option {{ isInputChecked($case->ward_id,45,'s') }} value='45'>อัษฏางค์ 12 เหนือ</option>
            <option {{ isInputChecked($case->ward_id,46,'s') }} value='46'>อัษฏางค์ 6 ใต้</option>
            <option {{ isInputChecked($case->ward_id,47,'s') }} value='47'>อัษฏางค์ 6 เหนือ</option>
            <option {{ isInputChecked($case->ward_id,48,'s') }} value='48'>อัษฏางค์ 9 ใต้</option>
            <option {{ isInputChecked($case->ward_id,49,'s') }} value='49'>อัษฏางค์ 9 เหนือ</option>
            <option {{ isInputChecked($case->ward_id,50,'s') }} value='50'>อื่นๆ/ไม่ทราบ</option>
        </select>
    </div>
</div>