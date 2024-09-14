<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Entry Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="row justify-content-center mt-5">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Import</h1>
                </div>
                <div class="card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    {{-- <form method="post" action="{{ route('equipment.store') }}">
                        @csrf --}}

                        <label for="GroupofEquipment">Group of Equipment:</label>
                        <select name="GroupofEquipment" required>
                            <option value="FA04">FA04</option>
                            <option value="FA05">FA05</option>
                            <option value="FA06">FA06</option>
                            <option value="FA07">FA07</option>
                            <option value="FA08">FA08</option>
                            <option value="FA09">FA09</option>
                            <option value="FA12">FA12</option>
                            <option value="FA13">FA13</option>
                            <option value="FA14">FA14</option>
                            <option value="FA17">FA17</option>
                            <option value="FA18">FA18</option>
                            <option value="FA19">FA19</option>
                            <option value="FA20">FA20</option>
                            <option value="FA21">FA21</option>
                            <option value="FA32">FA32</option>
                            <option value="FD05">FD05</option>
                            <option value="FD07">FD07</option>
                            <option value="FD08">FD08</option>
                            <option value="FD18">FD18</option>
                            <option value="FN05">FN05</option>
                            <option value="FN07">FN07</option>
                            <option value="FN08">FN08</option>
                            <option value="FN09">FN09</option>
                            <option value="FN12">FN12</option>
                            <option value="FN14">FN14</option>
                            <option value="FN17">FN17</option>
                            <option value="FN18">FN18</option>
                            <option value="FN19">FN19</option>
                            <option value="FN20">FN20</option>
                            <option value="FP07">FP07</option>
                            <option value="FP18">FP18</option>
                        </select>

                        <label for="SerialNo">Serial No:</label>
                        <input type="text" name="SerialNo" required>

                        <label for="NameEquipment">Name Equipment:</label>
                        <input type="text" name="NameEquipment" required>

                        <label for="cost">Cost:</label>
                        <input type="number" name="cost" required>

                        <label for="location">Location:</label>
                        <input type="text" name="location" required>

                        <label for="StartingDate">Starting Date:</label>
                        <input type="date" name="StartingDate" required>

                        <label for="Status">Status:</label>
                        <select name="Status" required>
                            <option value="ใช้งานปัจจุบัน">ใช้งานปัจจุบัน</option>
                            <option value="ชำรุจ">ชำรุจ</option>
                            <option value="ตัดจำหน่าย">ตัดจำหน่าย</option>
                            <option value="ยกเลิก">ยกเลิก</option>
                            <option value="ขาย">ขาย</option>
                        </select>

                        <label for="Company">Company:</label>
                        <select name="Company" required>
                            <option value="เจเอ เมดิคอล">เจเอ เมดิคอล</option>
                            <option
                                value="เจ้าหนี้บุคคลภายนอก(เบิกชดเชย) คณะศิลปศาสตร์และวิทยาการจัดการ วิทยาเขตเฉลิมพระเกียรติ จังหวัดสกลนคร">
                                เจ้าหนี้บุคคลภายนอก(เบิกชดเชย) คณะศิลปศาสตร์และวิทยาการจัดการ วิทยาเขตเฉลิมพระเกียรติ
                                จังหวัดสกลนคร</option>
                            <option value="โนอาห์ เน็ตเวิร์ค">โนอาห์ เน็ตเวิร์ค</option>
                            <option value="บริษัท  รีซเวฟ คอมมูนิเคชั่น จำกัด">บริษัท รีซเวฟ คอมมูนิเคชั่น จำกัด
                            </option>
                            <option value="บริษัท คิงส์เฟอร์นิเจอร์ซิตี้ จำกัด">บริษัท คิงส์เฟอร์นิเจอร์ซิตี้ จำกัด
                            </option>
                            <option value="บริษัท แกมมาโก้(ประเทศไทย) จำกัด">บริษัท แกมมาโก้(ประเทศไทย) จำกัด</option>
                            <option value="บริษัท เค.เอ็น.บี.เทคนโลยี จำกัด">บริษัท เค.เอ็น.บี.เทคนโลยี จำกัด
                            </option>
                            <option value="บริษัท เคเอ็นบี เอ็นจิเนีย จำกัด">บริษัท เคเอ็นบี เอ็นจิเนีย จำกัด
                            </option>
                            <option value="บริษัท ไคเนติดส์ คอร์ปอเรชั่น จำกัด">ริษัท ไคเนติดส์ คอร์ปอเรชั่น จำกัด
                            </option>
                            <option value="บริษัท เจอแรงการ์ เซอร์วิส(ไทยแลนด์) จำกัด">บริษัท เจอแรงการ์
                                เซอร์วิส(ไทยแลนด์) จำกัด
                            </option>
                            <option value="บริษัท ชัชรีย์ โฮลดิ้ง จำกัด">บริษัท ชัชรีย์ โฮลดิ้ง จำกัด
                            </option>
                            <option value="บริษัท ซอยล์เทสติ้งสยาม จำกัด">บริษัท ซอยล์เทสติ้งสยาม จำกัด
                            </option>
                            <option value="บริษัท ซีวิล เซอร์วิส เวิร์ค เอ็นจิเนียริ่ง จำกัด">บริษัท ซีวิล เซอร์วิส
                                เวิร์ค เอ็นจิเนียริ่ง จำกัด"</option>
                            <option value="บริษัท เซฟดีไซน์ คอนสตรัคชั่น แอนด์ เอ็นจิเนียริ่ง จำกัด">บริษัท เซฟดีไซน์
                                คอนสตรัคชั่น แอนด์ เอ็นจิเนียริ่ง จำกัด
                            </option>
                            <option value="บริษัท ไซแอนติฟิค โปรโมชั่น จำกัด">บริษัท ไซแอนติฟิค โปรโมชั่น จำกัด
                            </option>
                            <option value="บริษัท ดิโอ อินโนเวชั่น จำกัด">บริษัท ดิโอ อินโนเวชั่น จำกัด
                            </option>
                            <option value="บริษัท เดโช เทค จำกัด">บริษัท เดโช เทค จำกัด
                            </option>
                            <option value="บริษัท เดอะไซเอนซ์ แอนด์ เอ็ดดูเคชั่นแนล จำกัด">บริษัท เดอะไซเอนซ์ แอนด์
                                เอ็ดดูเคชั่นแนล จำกัด
                            </option>
                            <option value="บริษัท เดอะลีคเตอร์ ไฮเทค จำกัด">บริษัท เดอะลีคเตอร์ ไฮเทค จำกัด
                            </option>
                            <option value="บริษัท ทารา เทค อินเตอร์เนชั่นแนล จำกัด">บริษัท ทารา เทค อินเตอร์เนชั่นแนล
                                จำกัด
                            </option>
                            <option value="บริษัท ที.พี.ที.เครื่องมือสำรวจ จำกัด">บริษัท ที.พี.ที.เครื่องมือสำรวจ จำกัด
                            </option>
                            <option value="บริษัท ทูพีเอ็น เอ็นจิเนียริ่ง จำกัด">บริษัท ทูพีเอ็น เอ็นจิเนียริ่ง จำกัด
                            </option>
                            <option value="บริษัท เทคโนโลยีอินฟราสครัคเจอร์ จำกัด">บริษัท เทคโนโลยีอินฟราสครัคเจอร์
                                จำกัด
                            </option>
                            <option value="บริษัท โททอล เอ็จิเนียริ่ง(ไทยแลนด์) จำกัด">บริษัท โททอล
                                เอ็จิเนียริ่ง(ไทยแลนด์) จำกัด
                            </option>
                            <option value="บริษัท โทโมนิค จำกัด">บริษัท โทโมนิค จำกัด
                            </option>
                            <option value="บริษัท ไทยวิกตอรี่ จำกัด">บริษัท ไทยวิกตอรี่ จำกัด
                            </option>
                            <option value="บริษัท นีโอ ไดแด็กติค จำกัด">บริษัท นีโอ ไดแด็กติค จำกัด
                            </option>
                            <option value="บริษัท นีโอ เอ็นเทค จำกัด">บริษัท นีโอ เอ็นเทค จำกัด
                            </option>
                            <option value="บริษัท บี.ดี.คอมพิสเตอรื จำกัด">บริษัท บี.ดี.คอมพิสเตอรื จำกัด
                            </option>
                            <option value="บริษัท เบคไทย กรุงเทพ อุปกรณ์เคมีภัรฑ์ จำกัด">บริษัท เบคไทย กรุงเทพ
                                อุปกรณ์เคมีภัรฑ์ จำกัด
                            </option>
                            <option value="บริษัท เบสต์อินบิต จำกัด">บริษัท เบสต์อินบิต จำกัด
                            </option>
                            <option value="บริษัท พาราไซแอนติฟิค จำกัด">บริษัท พาราไซแอนติฟิค จำกัด
                            </option>
                            <option value="บริษัท เพอร์กินเอลเมอร์ จำกัด">บริษัท เพอร์กินเอลเมอร์ จำกัด
                            </option>
                            <option value="บริษัท ฟิลด์เทค ออโตเมชั่น จำกัด">บริษัท ฟิลด์เทค ออโตเมชั่น จำกัด
                            </option>
                            <option value="บริษัท ยูเนี่ยนซายน์เทรดติ้ง จำกัด">บริษัท ยูเนี่ยนซายน์เทรดติ้ง จำกั
                            </option>
                            <option value="บริษัท รัซมอร์ พรีซิชั่น จำกัด">บริษัท รัซมอร์ พรีซิชั่น จำกัด
                            </option>
                            <option value="บริษัท ลานนาคอม จำกัด">บริษัท ลานนาคอม จำกัด
                            </option>
                            <option value="บริษัท แล็บ ลีดเดอร์ จำกัด">บริษัท แล็บ ลีดเดอร์ จำกัด
                            </option>
                            <option value="บริษัท เวิลด์สยามกรุ๊ป จำกัด">บริษัท เวิลด์สยามกรุ๊ป จำกัด
                            </option>
                            <option value="บริษัท หริกุล ซายเอนซ์ จำกัด">บริษัท หริกุล ซายเอนซ์ จำกัด
                            </option>
                            <option value="บริษัท ออฟฟิเชียล อีควิปเม้นท์ แมนูแฟคเจอริ่ง จำกัด">บริษัท ออฟฟิเชียล
                                อีควิปเม้นท์ แมนูแฟคเจอริ่ง จำกัด"
                            </option>
                            <option value="บริษัท เอ็น-สแควร์ เอ็นจิเนีย จำกัด">บริษัท เอ็น-สแควร์ เอ็นจิเนีย จำกัด
                            </option>
                            <option value="บริษัท เอ็น.ที.เค ไซเอนติฟิค จำกัด">บริษัท เอ็น.ที.เค ไซเอนติฟิค จำกัด
                            </option>
                            <option value="บริษัท เอ็นทค แอสโซซิเอท จำกัด">บริษัท เอ็นทค แอสโซซิเอท จำกัด
                            </option>
                            <option value="บริษัท เอ็นวายซายน์ จำกัด">บริษัท เอ็นวายซายน์ จำกัด
                            </option>
                            <option value="บริษัท เอพเพนดอร์ฟ(ประเทศไทย) จำกัด">บริษัท เอพเพนดอร์ฟ(ประเทศไทย) จำกัด
                            </option>
                            <option value="บริษัท เอ็ม ดี โปรซัพพลายส์ จำกัด">บริษัท เอ็ม ดี โปรซัพพลายส์ จำกัด
                            </option>
                            <option value="บริษัท เอ็มเอส เอเซีย เทคโนโลยี จำกัด">บริษัท เอ็มเอส เอเซีย เทคโนโลยี จำกัด
                            </option>
                            <option value="บริษัท เอสซีเค ซีสเต็มส์ จำกัด">บริษัท เอสซีเค ซีสเต็มส์ จำกัด
                            </option>
                            <option value="บริษัท แอ็กโซ เคมิคอลส์ แอนด์ เซอร์วิสเซส จำกัด">บริษัท แอ็กโซ เคมิคอลส์
                                แอนด์ เซอร์วิสเซส จำกัด
                            </option>
                            <option value="บริษัท โอไอซีอี ออโตเมชั่น จำกัด">บริษัท โอไอซีอี ออโตเมชั่น จำกัด
                            </option>
                            <option value="บริษัท ไอที สมาร์ท จำกัด">บริษัท ไอที สมาร์ท จำกัด
                            </option>
                            <option value="บริษัท ฮอลลีวู้ด อินเตอร์เนชั่นแนล จำกัด">บริษัท ฮอลลีวู้ด อินเตอร์เนชั่นแนล
                                จำกัด
                            </option>
                            <option value="บริษัท โฮมพลัส เฟอร์นิเจอร์มอล สกล จำกัด">บริษัท โฮมพลัส เฟอร์นิเจอร์มอล สกล
                                จำกัด
                            </option>
                            <option value="ร้านขอนแก่นการไฟฟ้า">ร้านขอนแก่นการไฟฟ้า
                            </option>
                            <option value="ร้านทวีโลหะ">ร้านทวีโลหะ
                            </option>
                            <option value="ร้านพงเจริญการช่าง">ร้านพงเจริญการช่าง
                            </option>
                            <option value="ร้านมงคลคอมพิวเตอร์">ร้านมงคลคอมพิวเตอร์
                            </option>
                            <option value="ร้านสมบูรณ์อีเซอร์วิส">ร้านสมบูรณ์อีเซอร์วิส
                            </option>
                            <option value="สกลแอร์แอนด์เซอร์วิส">สกลแอร์แอนด์เซอร์วิส
                            </option>
                            <option value="ห้างหุ้นส่วนจำกัด ซี.บี.เอ็น.เอ็นจิเนียริ่ง">ห้างหุ้นส่วนจำกัด
                                ซี.บี.เอ็น.เอ็นจิเนียริ่ง
                            </option>
                            <option value="ห้างหุ้นส่วนจำกัด ซูปเปร์เจ็ดไอที แอนด์ เน็ทเวิร์ค">ห้างหุ้นส่วนจำกัด
                                ซูปเปร์เจ็ดไอที แอนด์ เน็ทเวิร์ค
                            </option>
                            <option value="ห้างหุ้นส่วนจำกัด ทรีดีอินโน เวชั่นแอนด์เทคโนโลยี">ห้างหุ้นส่วนจำกัด
                                ทรีดีอินโน เวชั่นแอนด์เทคโนโลยี
                            </option>
                            <option value="ห้างหุ้นส่วนจำกัด ที.พี.ที.เครื่องมือสำรวจ">ห้างหุ้นส่วนจำกัด
                                ที.พี.ที.เครื่องมือสำรวจ
                            </option>
                            <option value="ห้างหุ้นส่วนจำกัด บี จี แอ็ด เวอร์ไทซิ่ง">ห้างหุ้นส่วนจำกัด บี จี แอ็ด
                                เวอร์ไทซิ่ง
                            </option>
                            <option value="ห้างหุ้นส่วนจำกัด พิทักษ์ โท เทิ่ล โซลูชั่น">ห้างหุ้นส่วนจำกัด พิทักษ์ โท
                                เทิ่ล โซลูชั่น
                            </option>
                            <option value="ห้างหุ้นส่วนจำกัด ภูพาน เทรดดิ้ง กรุ๊ป">ห้างหุ้นส่วนจำกัด ภูพาน เทรดดิ้ง
                                กรุ๊ป
                            </option>
                            <option value="ห้างหุ้นส่วนจำกัด สกลรัตน์เทรดดิ้ง">ห้างหุ้นส่วนจำกัด สกลรัตน์เทรดดิ้ง
                            </option>
                            <option value="ห้างหุ้นส่วนจำกัด เอส.เอ็ม.ที.แมชชีนทูลเทคโนโลยี">ห้างหุ้นส่วนจำกัด
                                เอส.เอ็ม.ที.แมชชีนทูลเทคโนโลยี
                            </option>
                            <option value="ห้างหุ้นส่วนจำกัด เอสไอเอ็ม โกบอล เอ็นจิเนียรี่ง">ห้างหุ้นส่วนจำกัด
                                เอสไอเอ็ม โกบอล เอ็นจิเนียรี่ง
                            </option>
                            <option value="ห้างหุ้นส่วนจำกัด ไอ เค้น ไซ เอนทิฟิค">ห้างหุ้นส่วนจำกัด ไอ เค้น ไซ เอนทิฟิค
                            </option>
                        </select>

                        <div class="mb-3">
                            <div class="d-grid"><a href="#">
                                    <button class="btn btn-primary">Submit</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
