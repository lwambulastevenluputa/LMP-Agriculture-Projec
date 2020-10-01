<?php 

    include 'database/db_connection.php';

    $grand_total = 0;
    $allItems = '';
    $items = array();

    $query = "SELECT CONCAT(product_name, '(',qty,')') AS ItemQty, total_price FROM cart";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc()) {
        $grand_total += $row['total_price'];
        $items[] = $row['ItemQty'];
    }

    // Join array elements with a string
    $allItems = implode(", ", $items);
?>

<?php 
    include 'views/layout/header_v2.php';
?>

        <div class="container top-padding-60">
            <div class="row justify-content-center">
                <!-- <div class="col-lg-6">
                    <div class="bill-to">
                        <p>Enter Shipping Address</p>
                            <form action="">
                                <input type="text" name="" id="" placeholder="Full Name">
                                <input type="text" name="" id="" placeholder="Street address, P.O.Box, Comapany name, c/o">
                                <input type="text" name="" id="" placeholder="Apartment, suit, unit, building, floor, etc">
                                <input type="text" name="" id="" placeholder="City">
                                <input type="text" name="" id="" placeholder="State/Province/Region">
                                <input type="text" name="" id="" placeholder="ZIP">
                                <select>
			                    	<option>-- Country --</option>
			                    	<option>United States</option>
			                    	<option>Bangladesh</option>
			                    	<option>UK</option>
			                    	<option>India</option>
			                    	<option>Pakistan</option>
			                    	<option>Ucrane</option>
			                    	<option>Canada</option>
			                    	<option>Dubai</option>
			                    </select>
                                <input type="text" name="" id="" placeholder="Phone number">
                            </form>
                    </div>
                </div> -->
                <div class="col-lg-6">
                    <h4 class="text-mango-orange p-2">Enter Shipping Address</h4>
                    <!-- Delivery Form -->
                    <form action="" method="post" id="placeOrder">
                        <!-- User Details -->
                        <input type="hidden" name="products" value="<?= $allItems; ?>">
                        <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
                        <div class="form-group">
                            <label for="name">Full Name: </label>
                            <input name="name" type="text" class="form-control" placeholder="Muzala Shinka" required>
                        </div>
                        <div class="form-group">
                            <label for="address1">Address line 1: </label>
                            <input name="address1" type="text" class="form-control" placeholder="Street address, P.O.Box, Comapany name, c/o" required>
                        </div>
                        <div class="form-group">
                            <label for="address1">Address line 2: </label>
                            <input type="text" name="address2" class="form-control" placeholder="Apartment, suit, unit, building, floor, etc">
                        </div>
                        <div class="form-group">
                            <label for="city">City: </label>
                            <input type="text" name="city" class="form-control" placeholder="Lusaka" required>
                        </div>
                        <div class="form-group">
                            <label for="state">State/Province/Region: </label>
                            <input type="text" name="state" class="form-control" placeholder="State/Province/Region" required>
                        </div>
                        <div class="form-group">
                            <label for="zip">ZIP Code: </label>
                            <input type="text" name="zip" class="form-control" placeholder="ZIP/Postal Code" required>
                        </div>
                        <div class="form-group">
                            <label for="country">Country: </label>
                            <select class="form-control" name="country">
			                	<option>-- Country --</option>
			                	<option value="AF">Afghanistan</option>
			                	<option value="AX">Aland Islands</option>
			                	<option value="AL">Albania</option>
			                	<option value="DZ">Algeria</option>
			                	<option value="AS">American Samoa</option>
			                	<option value="AD">Andorra</option>
			                	<option value="AO">Angola</option>
			                	<option value="AI">Anguilla</option>
			                	<option value="AQ">Antarctica</option>
			                	<option value="AG">Antigua and Barbuda</option>
			                	<option value="AR">Argentina</option>
			                	<option value="AM">Armenia</option>
			                	<option value="AW">Aruba</option>
			                	<option value="AU">Australia</option>
			                	<option value="AT">Austria</option>
			                	<option value="AZ">Azerbaijan</option>
			                	<option value="BS">Bahamas, The</option>
			                	<option value="BH">Bahrain</option>
			                	<option value="BD">Bangladesh</option>
			                	<option value="BB">Barbados</option>
			                	<option value="BY">Belarus</option>
			                	<option value="BE">Belgium</option>
			                	<option value="BZ">Belize</option>
			                	<option value="BJ">Benin</option>
			                	<option value="BM">Bermuda</option>
			                	<option value="BT">Bhutan</option>
			                	<option value="BO">Bolivia</option>
			                	<option value="BQ">Bonaire, Saint Eustatius and Saba</option>
			                	<option value="BA">Bosnia and Herzegovia</option>
			                	<option value="BW">Botswana</option>
			                	<option value="BV">Bouvet Island</option>
			                	<option value="BR">Brazil</option>
			                	<option value="IO">British Indian Ocean Territory</option>
			                	<option value="BN">Brunei Darussalam</option>
			                	<option value="BG">Bulgaria</option>
			                	<option value="BF">Burkina Faso</option>
			                	<option value="BI">Burundi</option>
			                	<option value="KH">Cambodia</option>
			                	<option value="CM">Cameroon</option>
			                	<option value="CA">Canada</option>
			                	<option value="CV">Cape Verde</option>
			                	<option value="KY">Cayman Islands</option>
			                	<option value="CF">Central African Republic</option>
			                	<option value="TD">Chad</option>
			                	<option value="CL">Chile</option>
			                	<option value="CN">China</option>
			                	<option value="CX">Chrismas Island</option>
			                	<option value="CC">Coco (Keeling) Islands</option>
			                	<option value="CO">Colombia</option>
			                	<option value="KM">Comoros</option>
			                	<option value="CG">Congo</option>
			                	<option value="CD">Congo, The Democratic Republic of the</option>
			                	<option value="CK">Cook Islands</option>
			                	<option value="CR">Costa Rica</option>
			                	<option value="CI">Cote D'ivoire</option>
			                	<option value="HR">Croatia</option>
			                	<option value="CW">Curacao</option>
			                	<option value="CY">Cyprus</option>
			                	<option value="CZ">Czech Republic</option>
			                	<option value="DK">Denmark</option>
			                	<option value="DJ">Djibouti</option>
			                	<option value="DM">Dominican</option>
			                	<option value="DO">Dominican Republic</option>
			                	<option value="EC">Euador</option>
			                	<option value="EG">Egypt</option>
			                	<option value="SV">El Salvador</option>
			                	<option value="GQ">Equatorial Guinea</option>
			                	<option value="ER">Eritrea</option>
			                	<option value="EE">Estonia</option>
			                	<option value="ET">Ethiopia</option>
			                	<option value="FK">Falkland Islands (Malvianas)</option>
			                	<option value="FO">Faroe Islands</option>
			                	<option value="FJ">Fiji</option>
			                	<option value="FI">Finland</option>
			                	<option value="FR">France</option>
			                	<option value="GF">French Guiana</option>
			                	<option value="PF">French Polynesia</option>
			                	<option value="TF">French Southern Territories</option>
			                	<option value="GA">Gabon</option>
			                	<option value="GM">Gambia</option>
			                	<option value="GE">Georgia</option>
			                	<option value="DE">Germany</option>
			                	<option value="GH">Ghana</option>
			                	<option value="GI">Gibraltar</option>
			                	<option value="GR">Greece</option>
			                	<option value="GL">Greenland</option>
			                	<option value="GD">Grenada</option>
			                	<option value="GP">Guadeloupe</option>
			                	<option value="GU">Guam</option>
			                	<option value="GT">Guatemala</option>
			                	<option value="GG">Guernsey</option>
			                	<option value="GN">Guinea</option>
			                	<option value="GW">Guinea-Bissau</option>
			                	<option value="GY">Guyana</option>
			                	<option value="HT">Haiti</option>
			                	<option value="HM">Heard Island and the McDonald Islands</option>
			                	<option value="VA">Holy See</option>
			                	<option value="HN">Honduras</option>
			                	<option value="HK">Hong Kong</option>
			                	<option value="HU">Hungary</option>
			                	<option value="IS">Iceland</option>
			                	<option value="IN">India</option>
			                	<option value="ID">Indonesia</option>
			                	<option value="IQ">Iraq</option>
			                	<option value="IE">Ireland</option>
			                	<option value="IM">Isle of Man</option>
			                	<option value="IL">Israel</option>
			                	<option value="IT">Italy</option>
			                	<option value="JM">Jamaica</option>
			                	<option value="JP">Japan</option>
			                	<option value="JE">Jersey</option>
			                	<option value="JO">Jordan</option>
			                	<option value="KZ">Kazakhstan</option>
			                	<option value="KE">Kenya</option>
			                	<option value="KI">Kiribati</option>
			                	<option value="KR">Korea, Republic of</option>
			                	<option value="XK">Kosovo</option>
			                	<option value="KW">Kuwait</option>
			                	<option value="KG">Kyrgyzstan</option>
			                	<option value="LA">Lao People's Democratic Republic</option>
			                	<option value="LV">Latvia</option>
			                	<option value="LB">Lebanon</option>
			                	<option value="LS">Lesotho</option>
			                	<option value="LR">Liberia</option>
			                	<option value="LY">Libya</option>
			                	<option value="LI">Liechtenstein</option>
			                	<option value="LT">Lithuania</option>
			                	<option value="LU">Luxembourg</option>
			                	<option value="MO">Macao</option>
			                	<option value="MK">Macedonia, The Former Yugoslav Republic of</option>
			                	<option value="MG">Madagascar</option>
			                	<option value="MW">Malawi</option>
			                	<option value="MY">Malaysia</option>
			                	<option value="MV">Maldives</option>
			                	<option value="ML">Mali</option>
			                	<option value="MT">Malta</option>
			                	<option value="MH">Marshall Islands</option>
			                	<option value="MQ">Martinique</option>
			                	<option value="MR">Mauritania</option>
			                	<option value="MU">Mauritius</option>
			                	<option value="YT">Mayotte</option>
			                	<option value="MX">Mexico</option>
			                	<option value="FM">Micronesia, Federated States of</option>
			                	<option value="MD">Moldova, Republic of</option>
			                	<option value="MC">Monaco</option>
			                	<option value="MN">Mongolia</option>
			                	<option value="ME">Montenegro</option>
			                	<option value="MS">Montserrat</option>
			                	<option value="MA">Morocco</option>
			                	<option value="MZ">Mozambique</option>
			                	<option value="MM">Myanmar</option>
			                	<option value="NA">Namibia</option>
			                	<option value="NR">Nauru</option>
			                	<option value="NP">Nepal</option>
			                	<option value="NL">Netherlands</option>
			                	<option value="AN">Netherlands Antilles</option>
			                	<option value="NC">New Caledonia</option>
			                	<option value="NZ">New Zealand</option>
			                	<option value="NI">Nicaragua</option>
			                	<option value="NE">Niger</option>
			                	<option value="NG">Nigeria</option>
			                	<option value="NU">Niue</option>
			                	<option value="NF">Norfolk Island</option>
			                	<option value="MP">Northern Mariana Islands</option>
			                	<option value="NO">Norway</option>
			                	<option value="OM">Oman</option>
			                	<option value="PK">Pakistan</option>
			                	<option value="PW">Palau</option>
			                	<option value="PS">Palestinian Territories</option>
			                	<option value="PA">Panama</option>
			                	<option value="PG">Papua New Guinea</option>
			                	<option value="PY">Paraguay</option>
			                	<option value="PE">Peru</option>
			                	<option value="PH">Philippines</option>
			                	<option value="PN">Pitcairn</option>
			                	<option value="PL">Poland</option>
			                	<option value="PT">Portugal</option>
			                	<option value="PR">Puerto Rico</option>
			                	<option value="QA">Qatar</option>
			                	<option value="RE">Reunion</option>
			                	<option value="RO">Romania</option>
			                	<option value="RU">Russian Federation</option>
			                	<option value="RW">Rwanda</option>
			                	<option value="BL">Saint Barthelemy</option>
			                	<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
			                	<option value="KN">Saint Kitts and Nevis</option>
			                	<option value="LC">Saint Lucia</option>
			                	<option value="MF">Saint Martin</option>
			                	<option value="PM">Saint Pierre and Miquelon</option>
			                	<option value="VC">Saint Vincent and the Grenadines</option>
			                	<option value="WS">Samoa</option>
			                	<option value="SM">San Marino</option>
			                	<option value="ST">Sao Tome and Principe</option>
			                	<option value="SA">Saudi Arabia</option>
			                	<option value="SN">Senegal</option>
			                	<option value="RS">Serbia</option>
			                	<option value="SC">Seychelles</option>
			                	<option value="SL">Sierra Leone</option>
			                	<option value="SG">Singapore</option>
			                	<option value="SX">Sint Maarten</option>
			                	<option value="SK">Slovakia</option>
			                	<option value="SI">Slovenia</option>
			                	<option value="SB">Solomon Islands</option>
			                	<option value="SO">Somalia</option>
			                	<option value="ZA">South Africa</option>
			                	<option value="GS">South Georgia and the South Sandwich Islands</option>
			                	<option value="ES">Spain</option>
			                	<option value="LK">Sri Lanka</option>
			                	<option value="SR">Suriname</option>
			                	<option value="SJ">Svalbard and Jan Mayen</option>
			                	<option value="SZ">Swaziland</option>
			                	<option value="SE">Sweden</option>
			                	<option value="CH">Switzerland</option>
			                	<option value="TW">Taiwan</option>
			                	<option value="TJ">Tajikistan</option>
			                	<option value="TZ">Tanzania, United Republic of</option>
			                	<option value="TH">Thailand</option>
			                	<option value="TL">Timor-leste</option>
			                	<option value="TG">Togo</option>
			                	<option value="TK">Tokelau</option>
			                	<option value="TO">Tonga</option>
			                	<option value="TT">Trinidad and Tobago</option>
			                	<option value="TN">Tunisia</option>
			                	<option value="TR">Turkey</option>
			                	<option value="TM">Turkmenistan</option>
			                	<option value="TC">Turks and Caicos Islands</option>
			                	<option value="TV">Tuvalu</option>
			                	<option value="UG">Uganda</option>
			                	<option value="UA">Ukraine</option>
			                	<option value="AE">United Arab Emirates</option>
			                	<option value="GB">United Kingdom</option>
			                	<option value="US">United States</option>
			                	<option value="UM">United States Minor Outlying Islands</option>
			                	<option value="UY">Uruguay</option>
			                	<option value="UZ">Uzbekistan</option>
			                	<option value="VU">Vanuatu</option>
			                	<option value="VE">Venezuela</option>
			                	<option value="VN">Vietnam</option>
			                	<option value="VG">Virgin Islands, British</option>
			                	<option value="VI">Virgin Islands, U.S.</option>
			                	<option value="WF">Wallis and Futuna</option>
			                	<option value="EH">Western Sahara</option>
			                	<option value="YE">Yemen</option>
			                	<option value="ZM" selected>Zambia</option>
			                	<option value="ZW">Zimbabwe</option>
			                	<!-- <option>Bangladesh</option>
			                	<option>Ucrane</option>
			                	<option>Dubai</option> -->
			                </select>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number: </label>
                            <input type="tel" name="phone" class="form-control" placeholder="Enter Phone Number" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Email: </label>
                            <input name="email" type="email" class="form-control" placeholder="shinka@lendmepay.com" required>
                        </div>
                        <!-- Payment Method -->
                        <h6 class="text-center lead">Select Payment Mode</h6>
                        <div class="form-group">
                            <select name="pmode" id="" class="form-control">
                                <option value="" selected disabled>-Select Payment Mode-</option>
                                <option value="Bank Transfer">Direct Bank Transfer</option>
                                <option value="Check Payment">Check Payment</option>
                                <option value="PayPal">Paypal</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="more-instructions">Do we need additional instructions to find this address (optional): </label>
                            <textarea name="more-instructions" id="" cols="10" rows="3" class="form-control" placeholder="Provide details such as building description, a nearby landmark, or other navigation instructions"></textarea>
                        </div>
                        <!-- Place Order Button -->
                        <div class="form-group">
                            <input type="submit" name="submit" value="Place Order" class="btn bg-mango-orange btn-block">
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 px-4 pb-4" id="order">
                    <h4 class="text-mango-orange p-2">Order Summary</h4>
                    <!-- Jumbotron -->
                    <div class="jumbotron p-3 mb-2 text-center">
                        <h6 class="lead"><b>Products(s) : </b><?= $allItems; ?></h6>
                        <h6 class="lead"><b>Delivery Charge : </b>Free</h6>
                        <h5><b>Total Amount Payable : </b><?= number_format($grand_total,2) ?></h5>
                    </div>
                </div>
            </div>
        </div>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
    <script type="text/javascript">
        $(document).ready(function(){

            $("#placeOrder").submit(function(e){
                e.preventDefault();
                $.ajax({
                    url: 'addToCart.php',
                    method: 'post',
                    data: $('form').serialize()+"&action=order",
                    success: function(response){
                        $("#order").html(response);
                    }
                });
            });

            load_cart_item_number();

            function load_cart_item_number() {
                $.ajax({
                    url: 'addToCart.php',
                    method: 'get',
                    data: {cartItem: "cart_item"},
                    success: function(response){
                        $("#cart-item").html(response);
                    }
                });
            }
        });
    </script>
    </body>
</html>