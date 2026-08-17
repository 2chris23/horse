<div class="col-12 row">
    <form id="singlePagePaymentForm" name="singlePagePaymentForm " class="form-group col-12 ">
        <div class="panel panel-default col-6">
            <div class="panel-heading">

                <div class="row ">
                    <div class="col-md-12">

                        <input type="tel" id="ntdc" name="ntdc"
                               placeholder="Enter Card Number"
                               class="form-control" aria-invalid="true"
                               required="required" autocomplete="off">
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <span class="help-block text-muted small-font"> Expiry Month</span>
                        <input type="tel"  maxlength="2" class="form-control" placeholder="MM"/>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <span class="help-block text-muted small-font">  Expiry Year</span>
                        <input type="tel"  maxlength="2"  class="form-control" placeholder="YY"/>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <span class="help-block text-muted small-font">  CCV</span>
                        <input placeholder="CCV"
                               type="tel" id="cvv" name="cvv"
                               maxlength="3"
                               autocomplete="off" class="form-control"
                               required="required" aria-invalid="true"
                        />

                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <img src="assets/img/1.png" class="img-rounded"/>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-12 pad-adjust">
                        <input type="text" class="form-control" placeholder="Name On The Card"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 pad-adjust">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" checked class="text-muted"> Save details for fast payments <a
                                        href="#"> learn how ?</a>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                        <input type="submit" class="btn btn-danger" value="CANCEL"/>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                        <input type="submit" class="btn btn-warning btn-block" value="PAY NOW"/>
                    </div>
                </div>

            </div>
        </div>

{{--
        <div class="form-group col-4 row">
            <label for=""> PAIS </label>
            <select class="form-control" required="required">
                <option label="Albania" value="AL">Albania</option>
                <option label="Algeria" value="DZ">Algeria</option>
                <option label="Andorra" value="AD">Andorra</option>
                <option label="Angola" value="AO">Angola</option>
                <option label="Anguilla" value="AI">Anguilla</option>
                <option label="Antigua &amp; Barbuda" value="AG">Antigua &amp; Barbuda</option>
                <option label="Argentina" value="AR">Argentina</option>
                <option label="Armenia" value="AM">Armenia</option>
                <option label="Aruba" value="AW">Aruba</option>
                <option label="Australia" value="AU">Australia</option>
                <option label="Austria" value="AT">Austria</option>
                <option label="Azerbaijan" value="AZ">Azerbaijan</option>
                <option label="Bahamas" value="BS">Bahamas</option>
                <option label="Bahrain" value="BH">Bahrain</option>
                <option label="Barbados" value="BB">Barbados</option>
                <option label="Belarus" value="BY">Belarus</option>
                <option label="Belgium" value="BE">Belgium</option>
                <option label="Belize" value="BZ">Belize</option>
                <option label="Benin" value="BJ">Benin</option>
                <option label="Bermuda" value="BM">Bermuda</option>
                <option label="Bhutan" value="BT">Bhutan</option>
                <option label="Bolivia" value="BO">Bolivia</option>
                <option label="Bosnia &amp; Herzegovina" value="BA">Bosnia &amp; Herzegovina</option>
                <option label="Botswana" value="BW">Botswana</option>
                <option label="Brazil" value="BR">Brazil</option>
                <option label="British Virgin Islands" value="VG">British Virgin Islands</option>
                <option label="Brunei" value="BN">Brunei</option>
                <option label="Bulgaria" value="BG">Bulgaria</option>
                <option label="Burkina Faso" value="BF">Burkina Faso</option>
                <option label="Burundi" value="BI">Burundi</option>
                <option label="Cambodia" value="KH">Cambodia</option>
                <option label="Cameroon" value="CM">Cameroon</option>
                <option label="Canada" value="CA">Canada</option>
                <option label="Cape Verde" value="CV">Cape Verde</option>
                <option label="Cayman Islands" value="KY">Cayman Islands</option>
                <option label="Chad" value="TD">Chad</option>
                <option label="Chile" value="CL">Chile</option>
                <option label="China" value="C2">China</option>
                <option label="Colombia" value="CO">Colombia</option>
                <option label="Comoros" value="KM">Comoros</option>
                <option label="Congo - Brazzaville" value="CG">Congo - Brazzaville</option>
                <option label="Congo - Kinshasa" value="CD">Congo - Kinshasa</option>
                <option label="Cook Islands" value="CK">Cook Islands</option>
                <option label="Costa Rica" value="CR">Costa Rica</option>
                <option label="Côte d’Ivoire" value="CI">Côte d’Ivoire</option>
                <option label="Croatia" value="HR">Croatia</option>
                <option label="Cyprus" value="CY">Cyprus</option>
                <option label="Czech Republic" value="CZ">Czech Republic</option>
                <option label="Denmark" value="DK">Denmark</option>
                <option label="Djibouti" value="DJ">Djibouti</option>
                <option label="Dominica" value="DM">Dominica</option>
                <option label="Dominican Republic" value="DO">Dominican Republic</option>
                <option label="Ecuador" value="EC">Ecuador</option>
                <option label="Egypt" value="EG">Egypt</option>
                <option label="El Salvador" value="SV">El Salvador</option>
                <option label="Eritrea" value="ER">Eritrea</option>
                <option label="Estonia" value="EE">Estonia</option>
                <option label="Ethiopia" value="ET">Ethiopia</option>
                <option label="Falkland Islands" value="FK">Falkland Islands</option>
                <option label="Faroe Islands" value="FO">Faroe Islands</option>
                <option label="Fiji" value="FJ">Fiji</option>
                <option label="Finland" value="FI">Finland</option>
                <option label="France" value="FR">France</option>
                <option label="French Guiana" value="GF">French Guiana</option>
                <option label="French Polynesia" value="PF">French Polynesia</option>
                <option label="Gabon" value="GA">Gabon</option>
                <option label="Gambia" value="GM">Gambia</option>
                <option label="Georgia" value="GE">Georgia</option>
                <option label="Germany" value="DE">Germany</option>
                <option label="Gibraltar" value="GI">Gibraltar</option>
                <option label="Greece" value="GR">Greece</option>
                <option label="Greenland" value="GL">Greenland</option>
                <option label="Grenada" value="GD">Grenada</option>
                <option label="Guadeloupe" value="GP">Guadeloupe</option>
                <option label="Guatemala" value="GT">Guatemala</option>
                <option label="Guinea" value="GN">Guinea</option>
                <option label="Guinea-Bissau" value="GW">Guinea-Bissau</option>
                <option label="Guyana" value="GY">Guyana</option>
                <option label="Honduras" value="HN">Honduras</option>
                <option label="Hong Kong SAR China" value="HK">Hong Kong SAR China</option>
                <option label="Hungary" value="HU">Hungary</option>
                <option label="Iceland" value="IS">Iceland</option>
                <option label="India" value="IN">India</option>
                <option label="Indonesia" value="ID">Indonesia</option>
                <option label="Ireland" value="IE">Ireland</option>
                <option label="Israel" value="IL">Israel</option>
                <option label="Italy" value="IT">Italy</option>
                <option label="Jamaica" value="JM">Jamaica</option>
                <option label="Japan" value="JP">Japan</option>
                <option label="Jordan" value="JO">Jordan</option>
                <option label="Kazakhstan" value="KZ">Kazakhstan</option>
                <option label="Kenya" value="KE">Kenya</option>
                <option label="Kiribati" value="KI">Kiribati</option>
                <option label="Kuwait" value="KW">Kuwait</option>
                <option label="Kyrgyzstan" value="KG">Kyrgyzstan</option>
                <option label="Laos" value="LA">Laos</option>
                <option label="Latvia" value="LV">Latvia</option>
                <option label="Lesotho" value="LS">Lesotho</option>
                <option label="Liechtenstein" value="LI">Liechtenstein</option>
                <option label="Lithuania" value="LT">Lithuania</option>
                <option label="Luxembourg" value="LU">Luxembourg</option>
                <option label="Macedonia" value="MK">Macedonia</option>
                <option label="Madagascar" value="MG">Madagascar</option>
                <option label="Malawi" value="MW">Malawi</option>
                <option label="Malaysia" value="MY">Malaysia</option>
                <option label="Maldives" value="MV">Maldives</option>
                <option label="Mali" value="ML">Mali</option>
                <option label="Malta" value="MT">Malta</option>
                <option label="Marshall Islands" value="MH">Marshall Islands</option>
                <option label="Martinique" value="MQ">Martinique</option>
                <option label="Mauritania" value="MR">Mauritania</option>
                <option label="Mauritius" value="MU">Mauritius</option>
                <option label="Mayotte" value="YT">Mayotte</option>
                <option label="Mexico" value="MX">Mexico</option>
                <option label="Micronesia" value="FM">Micronesia</option>
                <option label="Moldova" value="MD">Moldova</option>
                <option label="Monaco" value="MC">Monaco</option>
                <option label="Mongolia" value="MN">Mongolia</option>
                <option label="Montenegro" value="ME">Montenegro</option>
                <option label="Montserrat" value="MS">Montserrat</option>
                <option label="Morocco" value="MA">Morocco</option>
                <option label="Mozambique" value="MZ">Mozambique</option>
                <option label="Namibia" value="NA">Namibia</option>
                <option label="Nauru" value="NR">Nauru</option>
                <option label="Nepal" value="NP">Nepal</option>
                <option label="Netherlands" value="NL">Netherlands</option>
                <option label="Netherlands Antilles" value="AN">Netherlands Antilles</option>
                <option label="New Caledonia" value="NC">New Caledonia</option>
                <option label="New Zealand" value="NZ">New Zealand</option>
                <option label="Nicaragua" value="NI">Nicaragua</option>
                <option label="Niger" value="NE">Niger</option>
                <option label="Nigeria" value="NG">Nigeria</option>
                <option label="Niue" value="NU">Niue</option>
                <option label="Norfolk Island" value="NF">Norfolk Island</option>
                <option label="Norway" value="NO">Norway</option>
                <option label="Oman" value="OM">Oman</option>
                <option label="Palau" value="PW">Palau</option>
                <option label="Panama" value="PA">Panama</option>
                <option label="Papua New Guinea" value="PG">Papua New Guinea</option>
                <option label="Paraguay" value="PY">Paraguay</option>
                <option label="Peru" value="PE" selected="selected">Peru</option>
                <option label="Philippines" value="PH">Philippines</option>
                <option label="Pitcairn Islands" value="PN">Pitcairn Islands</option>
                <option label="Poland" value="PL">Poland</option>
                <option label="Portugal" value="PT">Portugal</option>
                <option label="Qatar" value="QA">Qatar</option>
                <option label="Réunion" value="RE">Réunion</option>
                <option label="Romania" value="RO">Romania</option>
                <option label="Russia" value="RU">Russia</option>
                <option label="Rwanda" value="RW">Rwanda</option>
                <option label="Samoa" value="WS">Samoa</option>
                <option label="San Marino" value="SM">San Marino</option>
                <option label="São Tomé &amp; Príncipe" value="ST">São Tomé &amp; Príncipe</option>
                <option label="Saudi Arabia" value="SA">Saudi Arabia</option>
                <option label="Senegal" value="SN">Senegal</option>
                <option label="Serbia" value="RS">Serbia</option>
                <option label="Seychelles" value="SC">Seychelles</option>
                <option label="Sierra Leone" value="SL">Sierra Leone</option>
                <option label="Singapore" value="SG">Singapore</option>
                <option label="Slovakia" value="SK">Slovakia</option>
                <option label="Slovenia" value="SI">Slovenia</option>
                <option label="Solomon Islands" value="SB">Solomon Islands</option>
                <option label="Somalia" value="SO">Somalia</option>
                <option label="South Africa" value="ZA">South Africa</option>
                <option label="South Korea" value="KR">South Korea</option>
                <option label="Spain" value="ES">Spain</option>
                <option label="Sri Lanka" value="LK">Sri Lanka</option>
                <option label="St. Helena" value="SH">St. Helena</option>
                <option label="St. Kitts &amp; Nevis" value="KN">St. Kitts &amp; Nevis</option>
                <option label="St. Lucia" value="LC">St. Lucia</option>
                <option label="St. Pierre &amp; Miquelon" value="PM">St. Pierre &amp; Miquelon</option>
                <option label="St. Vincent &amp; Grenadines" value="VC">St. Vincent &amp; Grenadines</option>
                <option label="Suriname" value="SR">Suriname</option>
                <option label="Svalbard &amp; Jan Mayen" value="SJ">Svalbard &amp; Jan Mayen</option>
                <option label="Swaziland" value="SZ">Swaziland</option>
                <option label="Sweden" value="SE">Sweden</option>
                <option label="Switzerland" value="CH">Switzerland</option>
                <option label="Taiwan" value="TW">Taiwan</option>
                <option label="Tajikistan" value="TJ">Tajikistan</option>
                <option label="Tanzania" value="TZ">Tanzania</option>
                <option label="Thailand" value="TH">Thailand</option>
                <option label="Togo" value="TG">Togo</option>
                <option label="Tonga" value="TO">Tonga</option>
                <option label="Trinidad &amp; Tobago" value="TT">Trinidad &amp; Tobago</option>
                <option label="Tunisia" value="TN">Tunisia</option>
                <option label="Turkmenistan" value="TM">Turkmenistan</option>
                <option label="Turks &amp; Caicos Islands" value="TC">Turks &amp; Caicos Islands</option>
                <option label="Tuvalu" value="TV">Tuvalu</option>
                <option label="Uganda" value="UG">Uganda</option>
                <option label="Ukraine" value="UA">Ukraine</option>
                <option label="United Arab Emirates" value="AE">United Arab Emirates</option>
                <option label="United Kingdom" value="GB">United Kingdom</option>
                <option label="United States" value="US">United States</option>
                <option label="Uruguay" value="UY">Uruguay</option>
                <option label="Vanuatu" value="VU">Vanuatu</option>
                <option label="Vatican City" value="VA">Vatican City</option>
                <option label="Venezuela" value="VE">Venezuela</option>
                <option label="Vietnam" value="VN">Vietnam</option>
                <option label="Wallis &amp; Futuna" value="WF">Wallis &amp; Futuna</option>
                <option label="Yemen" value="YE">Yemen</option>
                <option label="Zambia" value="ZM">Zambia</option>
                <option label="Zimbabwe" value="ZW">Zimbabwe</option>
            </select>
        </div>
        --}}

        <div class="form-group col-12 row">
            <label for=""> expiry_value </label>
            <input type="text" name="expiry_value"
                   id="expiry_value" maxlength="5"
                   placeholder="MM/YY"
                   class="form-control"
                   aria-invalid="true"
                   required="required"
                   autocomplete="off">
        </div>
        <div class="form-group col-12 row">
            <label for=""> firstName </label>
            <input id="firstName" name="firstName"
                   value="" pattern="(?!^\d+$)^.+$"
                   autocapitalize="off"
                   autocomplete="off" maxlength="100"
                   class="form-control"
                   required="required"
                   aria-describedby="paddsxn"
                   aria-invalid="true">
        </div>
        <div class="form-group col-12 row">
            <label for=""> lastName </label>
            <input id="lastName" name="lastName"
                   value="" pattern="(?!^\d+$)^.+$"
                   autocapitalize="off"
                   autocomplete="off" maxlength="100"
                   class="form-control"
                   required="required"
                   aria-describedby="djogpol"
                   aria-invalid="true">
        </div>
        <div class="form-group col-12 row">
            <label for=""> phoneType </label>
            <select name="phoneType" id="phoneType"
                    class="form-control"
                    aria-describedby=""
                    aria-invalid="false">
                <option value="Mobile" selected="" class="form-control">Mobile</option>
                <option value="Home" class="form-control">Home</option>
                <!-- ngIf: !hideWork -->
                <option value="Work" class="form-control">Work</option>
                <!-- end ngIf: !hideWork -->
            </select>
        </div>
        <div class="form-group col-12 row">
            <label for=""> telephone </label>
            <input id="telephone"
                   class="telephone form-control"
                   type="tel" name="telephone" value=""
                   data-mask="000 000 000"
                   autocapitalize="off"
                   autocomplete="off"
                   data-error-key="validation.validPhone"
                   maxlength="11" required=""
                   aria-describedby="zjpolgx"
                   aria-invalid="true">
        </div>
        <div class="form-group col-12 row">
            <label for=""> billingLine2 </label>
            <input type="text" name="billingLine2"
                   id="billingLine2" value=""
                   maxlength="50"
                   autocapitalize="off"
                   autocomplete="off"
                   data-error-key="common.valueInvalid"
                   class="form-control">
        </div>
        <div class="form-group col-12 row">
            <label for=""> billingCity </label>
            <input type="text" name="billingCity"
                   id="billingCity" maxlength="100"
                   value="" autocapitalize="off"
                   autocomplete="off"
                   data-error-key="common.valueInvalid"
                   class="form-control"
                   required="required"
                   aria-describedby="eqoseal"
                   aria-invalid="true">
        </div>
        <div class="form-group col-12 row">
            <label for=""> billingPostalCode </label>
            <input type="text"
                   name="billingPostalCode"
                   id="billingPostalCode"
                   autocapitalize="off"
                   aria-required="true"
                   autocomplete="off"
                   minlength="" maxlength="5"
                   class="form-control"
                   aria-describedby=""
                   aria-invalid="false">
        </div>
        <div class="form-group col-12 row">
            <label for=""> billingState </label>
            <input type="text" name="billingState"
                   id="billingState" value=""
                   autocapitalize="off"
                   aria-required="true"
                   autocomplete="off"
                   class="form-control">
        </div>
        <div class="form-group col-12 row">
            <label for=""> billingLine1 </label>
            <input type="text" name="billingLine1"
                   id="billingLine1" value=""
                   maxlength="50"
                   autocapitalize="off"
                   autocomplete="off"
                   data-error-key="common.valueInvalid"
                   class="form-control"
                   required="required"
                   aria-describedby="frdjmx"
                   aria-invalid="true">
        </div>
        <div class="buttons">
            <button type="submit" class="btn btn-warning" track-input="Pay_Now" track-submit="signup" id="guestSubmit">
                Agree &amp; Pay
            </button>
        </div>
    </form>
</div>
