<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Print</title>

    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/print.css') }}" type="text/css" media="print"  charset="utf-8">

    <style type="text/css">
        body {
            font-size: 10pt;
            font-family: sans-serif;
        }
    </style>
</head>
<body>
    <!-- Patient -->
    <table style="width: 100%;">
        <thead>
            <tr>
                <th style="border: solid; width: 70%"><h1 style="margin-left: 12pt;"> Name: Mr. John Doe</h1></th>
                <th style="border: solid; width: 30%"><h1 style="margin-left: 12pt;"> HN: 51234123</h1></th>
            </tr>
        </thead>
    </table>

    <!-- Report title -->
    <div style="width: 100%; text-align: center;">
        <h1 style="text-decoration: underline;">Native/Graft Kidney Biopsy Procedure Note</h1>
    </div>

    <!-- Date and team -->
    <table style="width: 100%;">
        <tbody>
            <tr>
                <td style="border: none; text-align: center;width: 30%"><b>Date Biopsy : 01-Mar-2017</b></td>
                <td style="border: none; text-align: center;width: 35%"><b>Operator : Dr. Shivago</b></td>
                <td style="border: none; text-align: center;width: 35%"><b>Assistant : Dr. Shivava</b></td>
            </tr>
        </tbody>
    </table>

    <br/><br/>

    <!-- PROCEDURE NOTE -->
    <table style="width: 100%;">
        <tbody>
            <tr style="border: solid;"><td>
                <table style="width: 100%;">
                    <!-- FINDINGS -->
                    <tbody>
                        <tr>
                            <td style="border: none;"><p style=" margin-left: 12pt;"><b><u>Findings</u></b></p></td>
                        </tr>
                        <tr>
                            <td style="border: none;">
                                <span style="margin-left: 12pt;"><b>Native</b></span>
                                <span style="margin-left: 5%;"><b>Left kidney size :</b> 10 <b>cm. in length</b></span>
                                <span style="margin-left: 5%;"><b>Right kidney size :</b> 10.9 <b>cm. in length</b></span>
                            </td>
                        </tr>
                        <tr>
                            <td style="border: none;">
                                <span style="margin-left: 12pt;"><b>Echohenicity :</b> Normal</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="border: none;">
                                <span style="margin-left: 12pt;">Echohenicity describe</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td></tr>
            <tr style="border: solid;"><td>
                <table style="width: 100%;">
                    <!-- BP -->
                    <tbody>
                        <tr>
                            <td style="border: none;"><p style=" margin-left: 12pt;"><b>Pre biopsy BP :</b> 135/83 <b>mmHg.</b></p></td>
                        </tr>
                    </tbody>
                </table>
            </td></tr>
            <tr style="border: solid;"><td>
                <table style="width: 100%;">
                    <!-- LABORATORY -->
                    <tbody>
                        <tr>
                            <td style="border: none;"><p style=" margin-left: 12pt;"><b><u>Laboratory before biopsy</u></b></p></td>
                        </tr>
                        <tr>
                            <td style="border: none; width: 35%;"><p style=" margin-left: 12pt;"><b>Hct :</b> 24 <b>%</b></p></td>
                            <td style="border: none; width: 35%;"><p style=" margin-left: 12pt;"><b>Platelet :</b> 214000 <b>x10F9/ul</b></p></td>
                            <td style="border: none; width: 35%;"><p style=" margin-left: 12pt;"><b>Cr :</b> 32.9 <b>mg/dl</b></p></td>
                        </tr>
                        <tr>
                            <td style="border: none; width: 35%;"><p style=" margin-left: 12pt;"><b>BUN :</b> 10.6 <b>mg/dl</b></p></td>
                            <td style="border: none; width: 35%;"><p style=" margin-left: 12pt;"><b>PT :</b> 10.6 <b>sec.</b></p></td>
                            <td style="border: none; width: 35%;"><p style=" margin-left: 12pt;"><b>PTT :</b> 32.9 <b>sec.</b>
                        </tr>
                        <tr>
                            <td style="border: none; width: 35%;"><p style=" margin-left: 12pt;"><b>HBsAg :</b> Negative</p></td>
                            <td style="border: none; width: 35%;"><p style=" margin-left: 12pt;"><b>Anti HCV :</b> Negative</p></td>
                            <td style="border: none; width: 35%;"><p style=" margin-left: 12pt;"><b>Anti HIV :</b> Negative</p></td>
                        </tr>
                    </tbody>
                </table>
            </td></tr>
            <tr style="border: solid;"><td>
                <table style="width: 100%;">
                    <!-- OPERATION DETAIL -->
                    <tbody>
                        <tr><td style="border: none;"><p style=" margin: 20pt;">
                            The patient was in <b>PRONE</b> position. The procedure was done under sterile technique. 1% xylocaine <b>ML</b> ml was use as local anesthesia. Percutaneous renal biopsy under ultrasound guidance was performed at <b>U/S</b> pole of <b>SIDE</b> <b>SIDE2</b> kidney by using <b>NEEDLE_SIZE</b> guage <b>NEEDLE_TYPE</b> biopsy needle. <b>NO_PUNC</b> puncture(s) was/were attempted and <b>NO_CORE</b> renal core(s) was/were obtained <b>ALL_CORE_LENGTH</b> cm in length. Approximate operation time <b>OP_LAST</b> mins. Post renal biopsy care was carried on as protocol. Post Bx BP <b>S/D_BP</b> mmHg.
                        </p></td></tr>
                    </tbody>
                </table>
            </td></tr>
            <tr style="border: solid;"><td>
                <table style="width: 100%;">
                    <!-- IMMEDIATE BIOPSY COMPLICATION -->
                    <tbody>
                        <tr>
                            <td style="border: none; width: 50%;">
                                <p style=" margin-left: 12pt;"><b>Immediate biopsy complication</b></p>
                            </td>
                            <td style="border: none; width: 50%;">
                                <input type="checkbox"> <label>No Immediate biopsy complication</label>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table style="width: 100%;">
                    <tbody>
                        <tr style="font-size: 10pt;">
                            <td style="border: none; width: 30%;">
                                <p style=" margin-left: 12pt;"><b>Hematoma Time :</b>_____<b>mins.</b></p>
                            </td>
                            <td style="border: none; width: 30%;">
                                <p style=" margin-left: 6pt;"><b>Hematoma Size :</b>_____<b>cm.</b></p>
                            </td>
                            <td style="border: none; width: 40%;">
                                <p style=" margin-left: 6pt;"><b>Gross Hematuria Time :</b>_____<b>mins.</b></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="border: none; width: 30%;">
                                @if ($case->hematoma_location != '')
                                <p style=" margin-left: 12pt;"><b>Hematoma Location :</b><u>{{ $case->hematoma_location }}</u></p>
                                @else
                                <p style=" margin-left: 12pt;"><b>Hematoma Location :</b>______</p>
                                @endif
                            </td>
                            <td style="border: none; width: 30%;">
                                <p style=" margin-left: 6pt;"><b>Hypertension Time :</b>____<b>mins.</b></p>
                            </td>
                            <td style="border: none; width: 40%;"></td>
                        </tr>
                    </tbody>
                </table>
                <table style="width: 100%;">
                    <tbody>
                        <tr>
                            <td style="border: none; width: 30%;"><p style=" margin-left: 12pt;"></p></td>
                            <td style="border: none; width: 70%;"><p style=" margin-left: 6pt;"><b>Other complication___________________________________________</b></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td></tr>
            <tr style="border: solid;"><td>
                <table style="width: 100%;">
                    <!-- RECORDER -->
                    <tbody>
                        <tr>
                            <td style="border: none; width: 50%;"><p style=" margin-left: 12pt;">ผู้บันทึกข้อมูล : MAY_DEAR_FELLOW</p></td>
                            <td style="border: none; width: 50%;"><p style=" margin-left: 6pt;"><b>Sign_______________________ Code_________</b></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tbody>
    </table>

    <!-- WARD DETAIL -->
    <div style="text-align: center; page-break-after: always;">
        <p>หอผู้ป่วยไตเทียมสง่า นิลวรางกูล ตึกประกันสังคมชั้น 3 โรงพยาบาลศิริราช โทร 99793</p>
    </div>

    <!-- Patient -->
    <table style="width: 100%;">
        <thead>
            <tr>
                <th style="border: solid; width: 70%"><h1 style="margin-left: 12pt;"> Name: Mr. John Doe</h1></th>
                <th style="border: solid; width: 30%"><h1 style="margin-left: 12pt;"> HN: 51234123</h1></th>
            </tr>
        </thead>
    </table>

    <!-- Report title -->
    <div style="width: 100%; text-align: center;">
        <h1 style="text-decoration: underline;">Progress Note : Post kidney biopsy</h1>
    </div>

    <table style="width: 100%;">
        <tbody>
            <tr>
                <!-- Day 0 -->
                <td style="border: solid; width: 50%;">
                    <!-- COMPLICATION -->
                    <table style="width: 100%;">
                        <tbody>
                            <tr>
                                <td style="width: 50; border: none;"><p style="margin-left: 12pt"><b>Postbiopsy Day 0</b></p></td>
                                <td style="width: 50; border: none;"><p style="margin-left: 12pt"><b>Date (ว/ด/พศ) : ___/___/____</b></p></td>
                            </tr>
                            <tr>
                                <td style="width: 50; border: none;"><p style="margin-left: 12pt">BP ___/___ mmHg.</p></td>
                                <td style="width: 50; border: none;"><p style="margin-left: 12pt">PR ____/min.</p></td>
                            </tr>
                            <tr>
                                <td style="width: 50; border: none;"><p style="margin-left: 12pt"><b>Complication</b></td>
                                <td style="width: 50; border: none;"><p style="margin-left: 12pt"><input type="radio"> <label>None</label> <input type="radio"> <label>Yes</label></td>
                            </tr>
                            <tr>
                                <td style="width: 50; border: none;"><p style="margin-left: 12pt"></td>
                                <td style="width: 50; border: none;"><p style="margin-left: 12pt"><input type="checkbox"> <label>Gross hematuria</label></td>
                            </tr>
                            <tr>
                                <td style="width: 50; border: none;"><p style="margin-left: 12pt"></td>
                                <td style="width: 50; border: none;"><p style="margin-left: 12pt"><input type="checkbox"> <label>Abdominal pain</label></td>
                            </tr>
                            <tr>
                                <td style="width: 50; border: none;"><p style="margin-left: 12pt"></td>
                                <td style="width: 50; border: none;"><p style="margin-left: 12pt"><input type="checkbox"> <label>Decreased Hct</label></td>
                            </tr>
                            <tr>
                                <td style="width: 50; border: none;"><p style="margin-left: 12pt"></td>
                                <td style="width: 50; border: none;"><p style="margin-left: 12pt"><input type="checkbox"> <label>Hypotension</label></td>
                            </tr>
                            <tr>
                                <td style="width: 50; border: none;"><p style="margin-left: 12pt"></td>
                                <td style="width: 50; border: none;"><p style="margin-left: 12pt"><input type="checkbox"> <label>Fever</label></td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- NOTE -->
                    <table style="width: 100%;">
                        <tbody>
                            <tr>
                                <td style="border: none;"><b style="margin-left: 12pt;">Note :</b>____________________________________</td>
                            </tr>
                            <tr>
                                <td style="border: none;"><b style="margin-left: 12pt;"></b>__________________________________________</td>
                            </tr>
                            <tr>
                                <td style="border: none;"><b style="margin-left: 12pt;"></b>Sign___________________________Code_______</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <!-- Day 1 -->
                <td style="border: solid; width: 50%;">
                    <!-- COMPLICATION -->
                    <table style="width: 100%;">
                        <tbody>
                            <tr>
                                <td style="width: 50; border: none;"><p style="margin-left: 12pt"><b>Postbiopsy Day 1</b></p></td>
                                <td style="width: 50; border: none;"><p style="margin-left: 12pt"><b>Date (ว/ด/พศ) : ___/___/____</b></p></td>
                            </tr>
                            <tr>
                                <td style="width: 50; border: none;"><p style="margin-left: 12pt">BP ___/___ mmHg.</p></td>
                                <td style="width: 50; border: none;"><p style="margin-left: 12pt">PR ____/min.</p></td>
                            </tr>
                            <tr>
                                <td style="width: 50; border: none;"><p style="margin-left: 12pt"><b>Complication</b></td>
                                <td style="width: 50; border: none;"><p style="margin-left: 12pt"><input type="radio"> <label>None</label> <input type="radio"> <label>Yes</label></td>
                            </tr>
                            <tr>
                                <td style="width: 50; border: none;"><p style="margin-left: 12pt"></td>
                                <td style="width: 50; border: none;"><p style="margin-left: 12pt"><input type="checkbox"> <label>Gross hematuria</label></td>
                            </tr>
                            <tr>
                                <td style="width: 50; border: none;"><p style="margin-left: 12pt"></td>
                                <td style="width: 50; border: none;"><p style="margin-left: 12pt"><input type="checkbox"> <label>Abdominal pain</label></td>
                            </tr>
                            <tr>
                                <td style="width: 50; border: none;"><p style="margin-left: 12pt"></td>
                                <td style="width: 50; border: none;"><p style="margin-left: 12pt"><input type="checkbox"> <label>Decreased Hct</label></td>
                            </tr>
                            <tr>
                                <td style="width: 50; border: none;"><p style="margin-left: 12pt"></td>
                                <td style="width: 50; border: none;"><p style="margin-left: 12pt"><input type="checkbox"> <label>Hypotension</label></td>
                            </tr>
                            <tr>
                                <td style="width: 50; border: none;"><p style="margin-left: 12pt"></td>
                                <td style="width: 50; border: none;"><p style="margin-left: 12pt"><input type="checkbox"> <label>Fever</label></td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- NOTE -->
                    <table style="width: 100%;">
                        <tbody>
                            <tr>
                                <td style="border: none;"><b style="margin-left: 12pt;">Note :</b>____________________________________</td>
                            </tr>
                            <tr>
                                <td style="border: none;"><b style="margin-left: 12pt;"></b>__________________________________________</td>
                            </tr>
                            <tr>
                                <td style="border: none;"><b style="margin-left: 12pt;"></b>Sign___________________________Code_______</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- TREATMENTS -->
    <table style="width: 100%; margin-top: 0pt; border: solid;">
        <tbody>
            <tr>
                <td style="border: none;"><b style="margin-left: 12pt;">Treatment of Biopsy complication (ถ้ามี) :</b></td>
            </tr>
            <tr><td style="border: none;"><br/></td></tr>
            <tr><td style="border: none;"><br/></td></tr>
            <tr><td style="border: none;"><br/></td></tr>
            <tr><td style="border: none;"><br/></td></tr>
            <tr><td style="border: none;"><br/></td></tr>
            <tr><td style="border: none;"><br/></td></tr>
            <tr><td style="border: none;"><br/></td></tr>
        </tbody>
    </table>

    <!-- COMPLICATION OUTCOME -->
    <table style="width: 100%; margin-top: 0pt; border: solid;">
        <tbody>
            <tr>
                <td style="border: none;"><b style="margin-left: 12pt;">Complication outcome (ถ้ามี) :</b></td>
            </tr>
            <tr><td style="border: none;"><input type="checkbox" style="margin-left: 12pt;"> Resolved, no impairment of renal function</td></tr>
            <tr><td style="border: none;"><input type="checkbox" style="margin-left: 12pt;"> Reversible ARF, <input type="checkbox" style="margin-left: 12pt;"> Turn CKD-no dialysis needed, <input type="checkbox" style="margin-left: 12pt;"> ESRD, <input type="checkbox" style="margin-left: 12pt;"> Death</td></tr>
            <tr>
                <td style="border: none;"><b style="margin-left: 12pt;">Note :</b>______________________________________________________________________________________</td>
            </tr>
            <tr><td style="border: none;"><b style="margin-left: 12pt;">___________________________________________________________________________________________</b></td></tr>
            <tr><td style="border: none;"><b style="margin-left: 12pt;">___________________________________________________________________________________________</b></td></tr>
            <tr><td style="border: none;"><b style="margin-left: 12pt;">___________________________________________________________________________________________</b></td></tr>
            <tr><td style="border: none;"><b style="margin-left: 12pt;">___________________________________________________________________________________________</b></td></tr>
        </tbody>
    </table>
    <!-- WARD DETAIL -->
    <div style="text-align: center; page-break-after: always;">
        <p>หอผู้ป่วยไตเทียมสง่า นิลวรางกูล ตึกประกันสังคมชั้น 3 โรงพยาบาลศิริราช โทร 99793</p>
    </div>
</body>
</html>