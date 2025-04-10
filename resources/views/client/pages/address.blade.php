@extends('client.layouts.main')

@section('title', 'Địa chỉ của bạn')

@section('content')
    <section class="bread-crumb">
        <div class="container">
            <ul class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
                <li class="home" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a itemprop="item" href="index.html" title="Trang chủ">
                        <span itemprop="name">Trang chủ</span>
                        <meta itemprop="position" content="1" />
                    </a>
                </li>

                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <strong itemprop="name">Địa chỉ của bạn</strong>
                    <meta itemprop="position" content="2" />
                </li>

            </ul>
        </div>
    </section>
    <section class="address">
        <div class="container page_address margin-bottom-20">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-3 col-left-ac">
                    <div class="block-account">
                        <h5 class="title-account">Trang tài khoản</h5>
                        <p>Xin chào, <span style="color:#ef4339;">HOÀNG VĂN LONG</span>&nbsp;!</p>
                        <ul>
                            <li>
                                <a class="title-info" href="/account">Thông tin tài khoản</a>
                            </li>
                            <li>
                                <a class="title-info" href="/account/orders">Đơn hàng của bạn</a>
                            </li>
                            <li>
                                <a class="title-info" href="/account/changepassword">Đổi mật khẩu</a>
                            </li>
                            <li>
                                <a disabled="disabled" class="title-info active" href="javascript:void(0);">Sổ địa chỉ (0)</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-lg-9">

                    <h1 class="title-head">Địa chỉ của bạn</h1>
                    <p class="btn-row">
                        <button class="btn-edit-addr btn btn-primary btn-more" type="button" onclick="Bizweb.CustomerAddress.toggleNewForm(); return false;" fdprocessedid="wftarl">Thêm địa chỉ</button>
                    </p>
                    <div id="add_address" class="form-list modal_address modal" style="height: 545px;">
                        <div class="btn-close closed_pop"><i class="fa fa-times"></i></div>
                        <h2 class="title_pop">
                            Thêm địa chỉ mới
                        </h2>
                        <form method="post" action="/account/addresses" id="customer_address" accept-charset="UTF-8" class="has-validation-callback"><input name="FormType" type="hidden" value="customer_address"><input name="utf8" type="hidden" value="true">
                        <div class="pop_bottom">
                            <div class="form_address">
                                <div class="field">
                                    <fieldset class="form-group">
                                        <input type="text" name="FullName" class="form-control" data-validation-error-msg="Không được để trống" data-validation="required" value="" autocapitalize="words">
                                        <label>Họ tên</label>
                                    </fieldset>
                                    <p class="error-msg"></p>
                                </div>
                                <div class="field">
                                    <fieldset class="form-group">
                                        <input type="number" class="form-control" id="Phone" pattern="\d+" name="Phone" maxlength="12" value="">
                                        <label>Số điện thoại</label>
                                    </fieldset>
                                </div>
                                <div class="field">
                                    <fieldset class="form-group">
                                        <input type="text" class="form-control" name="Company" value="">
                                        <label>Công ty</label>
                                    </fieldset>
                                </div>
                                <div class="field">
                                    <fieldset class="form-group">
                                        <input type="text" class="form-control" name="Address1" value="">
                                        <label>Địa chỉ</label>
                                    </fieldset>
                                </div>
                                <div class="field">
                                    <fieldset class="form-group select-field">
                                        <select name="Country" class="form-control vn-fix add has-content" id="mySelect1" data-default="Việt Nam"><option value="Abkhazia">Abkhazia</option><option value="Afghanistan">Afghanistan</option><option value="Albania">Albania</option><option value="Algeria">Algeria</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Antigua and Barbuda">Antigua and Barbuda</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Azerbaijan">Azerbaijan</option><option value="Bahamas">Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Belarus">Belarus</option><option value="Belgium">Belgium</option><option value="Belize">Belize</option><option value="Benin">Benin</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option><option value="Botswana">Botswana</option><option value="Brazil">Brazil</option><option value="Brunei">Brunei</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="Cambodia">Cambodia</option><option value="Cameroon">Cameroon</option><option value="Canada">Canada</option><option value="Cape Verde">Cape Verde</option><option value="Central African Republic">Central African Republic</option><option value="Chad">Chad</option><option value="Chile">Chile</option><option value="Colombia">Colombia</option><option value="Comoros">Comoros</option><option value="Congo-Brazzaville">Congo-Brazzaville</option><option value="Congo-Kinshasa">Congo-Kinshasa</option><option value="Costa Rica">Costa Rica</option><option value="Côte d'Ivoire">Côte d'Ivoire</option><option value="Croatia">Croatia</option><option value="Cuba">Cuba</option><option value="Cyprus">Cyprus</option><option value="Czech Republic">Czech Republic</option><option value="Denmark">Denmark</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Dominican Republic">Dominican Republic</option><option value="East Timor">East Timor</option><option value="Ecuador">Ecuador</option><option value="Egypt">Egypt</option><option value="El Salvador">El Salvador</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Eritrea">Eritrea</option><option value="Estonia">Estonia</option><option value="Ethiopia">Ethiopia</option><option value="Fiji">Fiji</option><option value="Finland">Finland</option><option value="France">France</option><option value="Gabon">Gabon</option><option value="Gambia">Gambia</option><option value="Georgia">Georgia</option><option value="Germany">Germany</option><option value="Ghana">Ghana</option><option value="Greece">Greece</option><option value="Grenada">Grenada</option><option value="Guatemala">Guatemala</option><option value="Guinea">Guinea</option><option value="Guinea-Bissau">Guinea-Bissau</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Honduras">Honduras</option><option value="Hong Kong">Hong Kong</option><option value="Hungary">Hungary</option><option value="Iceland">Iceland</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Iran">Iran</option><option value="Iraq">Iraq</option><option value="Ireland">Ireland</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Jamaica">Jamaica</option><option value="Japan (Nippon)">Japan (Nippon)</option><option value="Jordan">Jordan</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kiribati">Kiribati</option><option value="North Korea">North Korea</option><option value="Kosovo">Kosovo</option><option value="Kuwait">Kuwait</option><option value="Kyrgyzstan">Kyrgyzstan</option><option value="Laos">Laos</option><option value="Latvia">Latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option><option value="Liberia">Liberia</option><option value="Libya">Libya</option><option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Macedonia (FYROM)">Macedonia (FYROM)</option><option value="Madagascar">Madagascar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldives">Maldives</option><option value="Mali">Mali</option><option value="Malta">Malta</option><option value="Marshall Islands">Marshall Islands</option><option value="Mauritania">Mauritania</option><option value="Mauritius">Mauritius</option><option value="Mexico">Mexico</option><option value="Micronesia">Micronesia</option><option value="Moldova">Moldova</option><option value="Monaco">Monaco</option><option value="Mongolia">Mongolia</option><option value="Montenegro">Montenegro</option><option value="Morocco">Morocco</option><option value="Mozambique">Mozambique</option><option value="Myanmar">Myanmar</option><option value="Nagorno-Karabakh">Nagorno-Karabakh</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="Netherlands">Netherlands</option><option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nigeria">Nigeria</option><option value="South Korea">South Korea</option><option value="New Caledonia">New Caledonia</option><option value="Norway">Norway</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option><option value="Palau">Palau</option><option value="Palestine">Palestine</option><option value="Panama">Panama</option><option value="Papua New Guinea">Papua New Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Qatar">Qatar</option><option value="Romania">Romania</option><option value="Russia">Russia</option><option value="Rwanda">Rwanda</option><option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option><option value="Saint Lucia">Saint Lucia</option><option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option><option value="Samoa">Samoa</option><option value="San Marino">San Marino</option><option value="Sao Tome and Principe">Sao Tome and Principe</option><option value="Saudi Arabia">Saudi Arabia</option><option value="South Sudan">South Sudan</option><option value="Senegal">Senegal</option><option value="Serbia">Serbia</option><option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapore">Singapore</option><option value="Saint Helena">Saint Helena</option><option value="Slovakia">Slovakia</option><option value="Slovenia">Slovenia</option><option value="Solomon Islands">Solomon Islands</option><option value="Somalia">Somalia</option><option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option><option value="South Africa">South Africa</option><option value="South Ossetia">South Ossetia</option><option value="Spain">Spain</option><option value="Sri Lanka">Sri Lanka</option><option value="Sudan">Sudan</option><option value="Suriname">Suriname</option><option value="Swaziland">Swaziland</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Syria">Syria</option><option value="Tajikistan">Tajikistan</option><option value="Tanzania">Tanzania</option><option value="Thailand">Thailand</option><option value="Togo">Togo</option><option value="Tonga">Tonga</option><option value="Tokelau">Tokelau</option><option value="Trinidad and Tobago">Trinidad and Tobago</option><option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="China">China</option><option value="Turkmenistan">Turkmenistan</option><option value="Tuvalu">Tuvalu</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom">United Kingdom</option><option value="United States">United States</option><option value="Uruguay">Uruguay</option><option value="Uzbekistan">Uzbekistan</option><option value="Vanuatu">Vanuatu</option><option value="Vatican">Vatican</option><option value="Venezuela">Venezuela</option><option value="Vietnam">Vietnam</option><option value="Wales">Wales</option><option value="Western Sahara">Western Sahara</option><option value="Yemen">Yemen</option><option value="Zambia">Zambia</option><option value="Zimbabwe">Zimbabwe</option><option value="Taiwan">Taiwan</option></select>
                                        <label>Quốc gia</label>
                                    </fieldset>
                                </div>
                                <div class="group-country">
                                    <fieldset class="form-group select-field not-vn">
                                        <select name="Province" value="" class="form-control add has-content" id="mySelect2" data-address-type="province" data-address-zone="billing" data-select2-id="select2-data-billingProvince"></select>
                                        <label>Tỉnh thành</label>
                                    </fieldset>
                                    <fieldset class="form-group select-field not-vn">
                                        <select name="District" class="form-control add has-content" value="" id="mySelect3" data-address-type="district" data-address-zone="billing" data-select2-id="select2-data-billingDistrict"></select>
                                        <label>Quận huyện</label>
                                    </fieldset>
                                    <fieldset class="form-group select-field not-vn">
                                        <select name="Ward" class="form-control add has-content" value="" id="mySelect4" data-address-type="ward" data-address-zone="billing" data-select2-id="select2-data-billingWard"></select>
                                        <label>Phường xã</label>
                                    </fieldset>
                                </div>
                                <div class="field">
                                    <fieldset class="form-group">
                                        <input type="text" class="form-control" name="Zip" value="">
                                        <label>Mã Zip</label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="checkbox">
                                <label class="c-input c-checkbox" style="padding-left: 20px;">
                                    <input type="checkbox" id="address_default_address_" name="IsDefault" value="true">
                                    <span class="c-indicator">Đặt là địa chỉ mặc định?</span>
                                </label>
                            </div>
                            <div class="btn-row">
                                <button class="btn btn-lg btn-dark-address btn-outline article-readmore btn-close" type="button" onclick="Bizweb.CustomerAddress.toggleNewForm(); return false;"><span>Hủy</span></button>
                                <button class="btn btn-lg btn-primary btn-submit" id="addnew" type="submit"><span>Thêm địa chỉ</span></button>
                            </div>
                        </div>
                        </form>
                    </div>

                    <div class="row total_address">



                    </div>


                </div>
            </div>
        </div>
    </section>

@endsection

@section('js')
@endsection
