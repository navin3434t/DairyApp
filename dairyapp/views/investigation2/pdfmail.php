<!DOCTYPE html>
<html>
<head>
<title></title>
<style>
.text-right{
	text-align:right;
}
.first-table{
	border: 1px solid #636363;
    width: 100%;
    padding: 10px;
	margin:0px 0px 20px;
}
.first-table tr td{
	font-size:15px;
}
.second-table{
	border: 1px solid #636363;
    width: 100%;
    padding: 5px;
}


.myinput[type="checkbox"]:before{
    position: relative;
    display: block;
    width: 11px;
    height: 11px;
    border: 1px solid #808080;
    content: "";
    background: #FFF;
}
.myinput[type="checkbox"]:after{
    position: relative;
    display: block;
    left: 2px;
    top: -11px;
    width: 7px;
    height: 7px;
    border-width: 1px;
    border-style: solid;
    border-color: #B3B3B3 #dcddde #dcddde #B3B3B3;
    content: "";
    background-image: linear-gradient(135deg, #B1B6BE 0%,#FFF 100%);
    background-repeat: no-repeat;
    background-position:center;
}
.myinput[type="checkbox"]:checked:after{
    background-image:  url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAcAAAAHCAQAAABuW59YAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAIGNIUk0AAHolAACAgwAA+f8AAIDpAAB1MAAA6mAAADqYAAAXb5JfxUYAAAB2SURBVHjaAGkAlv8A3QDyAP0A/QD+Dam3W+kCAAD8APYAAgTVZaZCGwwA5wr0AvcA+Dh+7UX/x24AqK3Wg/8nt6w4/5q71wAAVP9g/7rTXf9n/+9N+AAAtpJa/zf/S//DhP8H/wAA4gzWj2P4lsf0JP0A/wADAHB0Ngka6UmKAAAAAElFTkSuQmCC'), linear-gradient(135deg, #B1B6BE 0%,#FFF 100%);
}
.newinput {
	position: relative;
    display: inline-block;
    left: 2px;
    width: 30%;
    height: 25px;
    border-width: 1px;
    border-style: solid;
    border-color: #8e8e8e;
    content: "";
    background: #fff;
    background-repeat: no-repeat;
    background-position: center;

}
</style>
</head>
<body>
<table style="width:100%">
	<tr>
		<td>
			<table class="first-table">
				<tbody>
					<tr>
						<td width="50%">Farm ADCD</td>
						<td width="50%" class="text-right">3/12/2017</td>
					</tr>
				<tbody>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table style="width:100%;">
				<tbody>
					<tr>
						<td style="font-size: 20px; font-weight: 600; padding:15px 0px 10px;">Recomended milking machine wash program</td>
					</tr>
					<tr>
						<td width="50%"><input type="checkbox" name="" value="" class="myinput"> Retain existing wash program</td>
						<td width="50%"><input type="checkbox" name="" value="" class="myinput">No, new recommended wash program</td>
					</tr>
					<tr>
						<td style="padding:15px 0 10px;">Wash Program Refrence Number <input type="text" name="" class="newinput"></td>
					</tr>
				</tbody>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table class="first-table">
				<tbody>
					<tr>
						<td style="font-weight:600;">AM WASH</td>
					</tr>
					<tr>
						<td width="100%;">
							<table class="second-table">
								<tbody>
									<tr>
										<td>Cycle:1</td>
									</tr>
									<tr>
										<td>
											<table width="100%">
												<tr>
													<td><input type="checkbox" name="monday" value=""  class="myinput"> Monday</td>
													<td><input type="checkbox" name="tuesday" value=""  class="myinput"> Tuesday</td>
													<td><input type="checkbox" name="wednesday" value="" class="myinput"> Wednesday</td>
													<td><input type="checkbox" name="thursday" value=""  class="myinput"> Thursday</td>
													<td><input type="checkbox" name="friday" value=""  class="myinput"> Friday</td>
													<td><input type="checkbox" name="saturday" value=""  class="myinput"> saturday</td>
													<td><input type="checkbox" name="sunday" value=""  class="myinput"> Sunday</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td>
											<table width="100%;">
												<tbody> 
													<tr>
														<td style="padding:20px 0 10px; text-align:right;" width="35%">Cycle Description : Test</td>
														<td  width="35%"style="padding:20px 0 10px; text-align:right;">Volume (litres) <input type="text" name="" class="newinput" value="" style="height:30px;"> </td>
														<td width="30%"></td>
													</tr>
													<tr>
														<td  width="35%" style="padding:20px 0 10px; text-align:right;"> Cleanser / Sanitiser <input type="text" name=""  class="newinput" value="" style="height:30px;border:1px solid #000000;" value="Test"> </td>
														<td width="35%" style="padding:20px 0 10px; text-align:right;">Temp Starts C <input type="text" name="" class="newinput" value="" style="height:30px;"> </td>
														<td width="30%"></td>
													</tr>
													<tr>
														<td width="35%" style="padding:20px 0 10px; text-align:right;"> Comments <input type="text" name="" value="" style="height:30px;" class="newinput"> </td>
														<td  width="35%" style="padding:20px 0 10px; text-align:right;">Temp Dump C <input type="text" name="" value="" style="height:30px;" class="newinput"> </td>
														<td width="30%"></td>
													</tr>
													<tr>
														<td style="padding:20px 0 10px; text-align:right;">  </td>
														<td style="padding:20px 0 10px; text-align:right;">Dose(g or ml) <input type="text" name="" value="" style="height:30px;" class="newinput"> </td>
														<td></td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr><!--cycle 1 tr-->
					<tr>
						<td width="100%;">
							<table class="second-table">
								<tbody>
									<tr>
										<td>Cycle:2</td>
									</tr>
									<tr>
										<td>
											<table width="100%;">
												<tbody>
													<tr>
														<td><input type="checkbox" name="monday" value=""> Monday</td>
														<td><input type="checkbox" name="tuesday" value=""> Tuesday</td>
														<td><input type="checkbox" name="wednesday" value=""> Wednesday</td>
														<td><input type="checkbox" name="thursday" value=""> Thursday</td>
														<td><input type="checkbox" name="friday" value=""> Friday</td>
														<td><input type="checkbox" name="saturday" value=""> saturday</td>
														<td><input type="checkbox" name="sunday" value=""> Sunday</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
									<tr>
										<td>
											<table width="100%;">
												<tbody> 
													<tr>
														<td style="padding:20px 0 10px; text-align:right;" width="35%">Cycle Description <input type="text" name="" value="" style="height:30px;" class="newinput"> </td>
														<td  width="35%"style="padding:20px 0 10px; text-align:right;">Volume (litres) <input type="text" name="" value="" style="height:30px;" class="newinput"> </td>
														<td width="30%"></td>
													</tr>
													<tr>
														<td  width="35%" style="padding:20px 0 10px; text-align:right;"> Cleanser / Sanitiser <input type="text" name="" value="" style="height:30px;" class="newinput"> </td>
														<td width="35%" style="padding:20px 0 10px; text-align:right;">Temp Starts C <input type="text" name="" value="" class="newinput" style="height:30px;"> </td>
														<td width="30%"></td>
													</tr>
													<tr>
														<td width="35%" style="padding:20px 0 10px; text-align:right;"> Comments <input type="text" name="" value=""  class="newinput" style="height:30px;"> </td>
														<td  width="35%" style="padding:20px 0 10px; text-align:right;">Temp Dump C <input type="text" name="" value="" style="height:30px;" class="newinput"> </td>
														<td width="30%"></td>
													</tr>
													<tr>
														<td style="padding:20px 0 10px; text-align:right;">  </td>
														<td style="padding:20px 0 10px; text-align:right;">Dose(g or ml) <input type="text" name="" value="" style="height:30px;" class="newinput"> </td>
														<td></td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
		</td>
	</tr><!--AM wash--->
	
	<tr>
		<td>
			<table class="first-table">
				<tbody>
					<tr>
						<td style="font-weight:600;">PM WASH</td>
					</tr>
					<tr>
						<td width="100%;">
							<table class="second-table">
								<tbody>
									<tr>
										<td>Cycle:1</td>
									</tr>
									<tr>
										<td>
											<table width="100%">
												<tr>
													<td><input type="checkbox" name="monday" value="" class="myinput"> Monday</td>
													<td><input type="checkbox" name="tuesday" value="" class="myinput"> Tuesday</td>
													<td><input type="checkbox" name="wednesday" value="" class="myinput"> Wednesday</td>
													<td><input type="checkbox" name="thursday" value="" class="myinput"> Thursday</td>
													<td><input type="checkbox" name="friday" value="" class="myinput"> Friday</td>
													<td><input type="checkbox" name="saturday" value="" class="myinput"> saturday</td>
													<td><input type="checkbox" name="sunday" value="" class="myinput"> Sunday</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td>
											<table width="100%;">
												<tbody> 
													<tr>
														<td style="padding:20px 0 10px; text-align:right;" width="35%">Cycle Description <input type="text" name="" value="" style="height:30px;" class="newinput"> </td>
														<td  width="35%"style="padding:20px 0 10px; text-align:right;">Volume (litres) <input type="text" name="" value="" style="height:30px;" class="newinput"> </td>
														<td width="30%"></td>
													</tr>
													<tr>
														<td  width="35%" style="padding:20px 0 10px; text-align:right;"> Cleanser / Sanitiser <input type="text" name="" value="" style="height:30px;" class="newinput"> </td>
														<td width="35%" style="padding:20px 0 10px; text-align:right;">Temp Starts C <input type="text" name="" value="" style="height:30px;" class="newinput"> </td>
														<td width="30%"></td>
													</tr>
													<tr>
														<td width="35%" style="padding:20px 0 10px; text-align:right;"> Comments <input type="text" name="" value="" style="height:30px;" class="newinput"> </td>
														<td  width="35%" style="padding:20px 0 10px; text-align:right;">Temp Dump C <input type="text" name="" value="" style="height:30px;" class="newinput"> </td>
														<td width="30%"></td>
													</tr>
													<tr>
														<td style="padding:20px 0 10px; text-align:right;">  </td>
														<td style="padding:20px 0 10px; text-align:right;">Dose(g or ml) <input type="text" name="" value="" style="height:30px;" class="newinput"> </td>
														<td></td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr><!--cycle 1 tr-->
					<tr>
						<td width="100%;">
							<table class="second-table">
								<tbody>
									<tr>
										<td>Cycle:2</td>
									</tr>
									<tr>
										<td>
											<table width="100%;">
												<tbody>
													<tr>
														<td><input type="checkbox" name="monday" value="" class="myinput"> Monday</td>
														<td><input type="checkbox" name="tuesday" value="" class="myinput"> Tuesday</td>
														<td><input type="checkbox" name="wednesday" value="" class="myinput"> Wednesday</td>
														<td><input type="checkbox" name="thursday" value="" class="myinput"> Thursday</td>
														<td><input type="checkbox" name="friday" value="" class="myinput"> Friday</td>
														<td><input type="checkbox" name="saturday" value="" class="myinput"> saturday</td>
														<td><input type="checkbox" name="sunday" value="" class="myinput"> Sunday</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
									<tr>
										<td>
											<table width="100%;">
												<tbody> 
													<tr>
														<td style="padding:20px 0 10px; text-align:right;" width="35%">Cycle Description <input type="text" name="" value="" style="height:30px;" class="newinput"> </td>
														<td  width="35%"style="padding:20px 0 10px; text-align:right;">Volume (litres) <input type="text" name="" value="" style="height:30px;" class="newinput"> </td>
														<td width="30%"></td>
													</tr>
													<tr>
														<td  width="35%" style="padding:20px 0 10px; text-align:right;"> Cleanser / Sanitiser <input type="text" name="" value="" style="height:30px;" class="newinput"> </td>
														<td width="35%" style="padding:20px 0 10px; text-align:right;">Temp Starts C <input type="text" name="" value="" style="height:30px;" class="newinput"> </td>
														<td width="30%"></td>
													</tr>
													<tr>
														<td width="35%" style="padding:20px 0 10px; text-align:right;"> Comments <input type="text" name="" value="" style="height:30px;" class="newinput"> </td>
														<td  width="35%" style="padding:20px 0 10px; text-align:right;">Temp Dump C <input type="text" name="" value="" style="height:30px;" class="newinput"> </td>
														<td width="30%"></td>
													</tr>
													<tr>
														<td style="padding:20px 0 10px; text-align:right;">  </td>
														<td style="padding:20px 0 10px; text-align:right;">Dose(g or ml) <input type="text" name="" value="" style="height:30px;" class="newinput"> </td>
														<td></td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
		</td>
	</tr><!--PM wash--->
</table><!--/main table-->
</body>
</html>