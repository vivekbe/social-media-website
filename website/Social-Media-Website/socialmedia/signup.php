<?php
 session_start();
 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    // redirect them to your desired location
    header('location:feed.php');
    exit;
}
?>

<html>

<head>
    <title>College Social Site</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="indexstyles.css">
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <h1 class="text-primary" style="font-size:4rem;padding-bottom:1.5rem;">College Social</h1>
                    <h2 class="headingindex">This Website help you connect and share with the people in your college
                    </h2>
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 outline" style="padding:10px 20px !important;">
                    <div class="pvl _52lp _59d-" style="padding: 10px 0px">
                        <div class="mbs _52lq fsl fwb fcb h3">Sign Up</div>
                        <div class="_52lr fsm fwn fcg">It's quick and easy.</div>
                    </div>
                    <form action="_signuphandler.php" method="post">
                        <!-- Name input -->
                        <div class="form-outline mb-3">
                            <input type="text" id="fullname" class="form-control form-control-lg" name="fullname"
                                placeholder="Full Name" />
                        </div>
                        <!-- Email input -->
                        <div class="form-outline mb-3">
                            <input type="email" id="form3Example3" class="form-control form-control-lg" name="loginemail"
                                placeholder="Email address" />
                        </div>

                        <div class="form-outline mb-3">
                            <div style="color:#90949c;font-size:12px;">Date Of Birth</div>
                            <div class="container" style="padding:0px !important;">
                                <div class="row">
                                    <div class="col">
                                        <select aria-label="Day" name="birthday_day" id="day" title="Day"
                                            class="form-control form-control-lg">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29" selected="1">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                        </select>

                                    </div>
                                    <div class="col">
                                        <select aria-label="Month" name="birthday_month" id="month" title="Month"
                                            class="form-control form-control-lg">
                                            <option value="1">Jan</option>
                                            <option value="2">Feb</option>
                                            <option value="3">Mar</option>
                                            <option value="4">Apr</option>
                                            <option value="5">May</option>
                                            <option value="6" selected="1">Jun</option>
                                            <option value="7">Jul</option>
                                            <option value="8">Aug</option>
                                            <option value="9">Sep</option>
                                            <option value="10">Oct</option>
                                            <option value="11">Nov</option>
                                            <option value="12">Dec</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select aria-label="Year" name="birthday_year" id="year" title="Year"
                                            class="form-control form-control-lg">
                                            <option value="2022" selected="1">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                            <option value="2019">2019</option>
                                            <option value="2018">2018</option>
                                            <option value="2017">2017</option>
                                            <option value="2016">2016</option>
                                            <option value="2015">2015</option>
                                            <option value="2014">2014</option>
                                            <option value="2013">2013</option>
                                            <option value="2012">2012</option>
                                            <option value="2011">2011</option>
                                            <option value="2010">2010</option>
                                            <option value="2009">2009</option>
                                            <option value="2008">2008</option>
                                            <option value="2007">2007</option>
                                            <option value="2006">2006</option>
                                            <option value="2005">2005</option>
                                            <option value="2004">2004</option>
                                            <option value="2003">2003</option>
                                            <option value="2002">2002</option>
                                            <option value="2001">2001</option>
                                            <option value="2000">2000</option>
                                            <option value="1999">1999</option>
                                            <option value="1998">1998</option>
                                            <option value="1997">1997</option>
                                            <option value="1996">1996</option>
                                            <option value="1995">1995</option>
                                            <option value="1994">1994</option>
                                            <option value="1993">1993</option>
                                            <option value="1992">1992</option>
                                            <option value="1991">1991</option>
                                            <option value="1990">1990</option>
                                            <option value="1989">1989</option>
                                            <option value="1988">1988</option>
                                            <option value="1987">1987</option>
                                            <option value="1986">1986</option>
                                            <option value="1985">1985</option>
                                            <option value="1984">1984</option>
                                            <option value="1983">1983</option>
                                            <option value="1982">1982</option>
                                            <option value="1981">1981</option>
                                            <option value="1980">1980</option>
                                            <option value="1979">1979</option>
                                            <option value="1978">1978</option>
                                            <option value="1977">1977</option>
                                            <option value="1976">1976</option>
                                            <option value="1975">1975</option>
                                            <option value="1974">1974</option>
                                            <option value="1973">1973</option>
                                            <option value="1972">1972</option>
                                            <option value="1971">1971</option>
                                            <option value="1970">1970</option>
                                            <option value="1969">1969</option>
                                            <option value="1968">1968</option>
                                            <option value="1967">1967</option>
                                            <option value="1966">1966</option>
                                            <option value="1965">1965</option>
                                            <option value="1964">1964</option>
                                            <option value="1963">1963</option>
                                            <option value="1962">1962</option>
                                            <option value="1961">1961</option>
                                            <option value="1960">1960</option>
                                            <option value="1959">1959</option>
                                            <option value="1958">1958</option>
                                            <option value="1957">1957</option>
                                            <option value="1956">1956</option>
                                            <option value="1955">1955</option>
                                            <option value="1954">1954</option>
                                            <option value="1953">1953</option>
                                            <option value="1952">1952</option>
                                            <option value="1951">1951</option>
                                            <option value="1950">1950</option>
                                            <option value="1949">1949</option>
                                            <option value="1948">1948</option>
                                            <option value="1947">1947</option>
                                            <option value="1946">1946</option>
                                            <option value="1945">1945</option>
                                            <option value="1944">1944</option>
                                            <option value="1943">1943</option>
                                            <option value="1942">1942</option>
                                            <option value="1941">1941</option>
                                            <option value="1940">1940</option>
                                            <option value="1939">1939</option>
                                            <option value="1938">1938</option>
                                            <option value="1937">1937</option>
                                            <option value="1936">1936</option>
                                            <option value="1935">1935</option>
                                            <option value="1934">1934</option>
                                            <option value="1933">1933</option>
                                            <option value="1932">1932</option>
                                            <option value="1931">1931</option>
                                            <option value="1930">1930</option>
                                            <option value="1929">1929</option>
                                            <option value="1928">1928</option>
                                            <option value="1927">1927</option>
                                            <option value="1926">1926</option>
                                            <option value="1925">1925</option>
                                            <option value="1924">1924</option>
                                            <option value="1923">1923</option>
                                            <option value="1922">1922</option>
                                            <option value="1921">1921</option>
                                            <option value="1920">1920</option>
                                            <option value="1919">1919</option>
                                            <option value="1918">1918</option>
                                            <option value="1917">1917</option>
                                            <option value="1916">1916</option>
                                            <option value="1915">1915</option>
                                            <option value="1914">1914</option>
                                            <option value="1913">1913</option>
                                            <option value="1912">1912</option>
                                            <option value="1911">1911</option>
                                            <option value="1910">1910</option>
                                            <option value="1909">1909</option>
                                            <option value="1908">1908</option>
                                            <option value="1907">1907</option>
                                            <option value="1906">1906</option>
                                            <option value="1905">1905</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-outline mb-3">
                            <div class="container" style="padding:0px !important;">
                                <div class="row">
                                    <div class="col">
                                        <div style="min-height: calc(1.5em + 1rem + 2px);
    padding: .5rem 1rem;
    font-size: 1.25rem;
    border:1px solid #ced4da;
    border-radius: .5rem;">
                                            <label class="_58mt" for="female" style="margin-right:16px;">Female</label>
                                            <input type="radio" class="_8esa " name="sex" value="1" id="female">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div style="min-height: calc(1.5em + 1rem + 2px);
    padding: .5rem 1rem;
    font-size: 1.25rem;
    border:1px solid #ced4da;
    border-radius: .5rem;">
                                            <label class="_58mt" for="male" style="margin-right:16px;">Male</label>
                                            <input type="radio" class="_8esa" name="sex" value="2" id="male">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div style="min-height: calc(1.5em + 1rem + 2px);
    padding: .5rem 1rem;
    font-size: 1.25rem;
    border:1px solid #ced4da;
    border-radius: .5rem;">
                                            <label class="_58mt" for="others" style="margin-right:16px;">Others</label>
                                            <input type="radio" class="_8esa" name="sex" value="3" id="others">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container" style="padding:0px !important;">
                            <div class="row">
                                <div class="col">
                                    <div class="form-outline mb-3">
                                        <input type="text" id="course" class="form-control form-control-lg" name="course"
                                            placeholder="Course" />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline mb-3">
                                        <input type="text" id="branch" class="form-control form-control-lg" name="branch"
                                            placeholder="Branch" />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline mb-3">
                                        <input type="text" id="yoa" class="form-control form-control-lg" name="batch"
                                            placeholder="Batch" />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline mb-3">
                                        <input type="text" id="clid" class="form-control form-control-lg" name="clgid"
                                            placeholder="Clg Id" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" id="form3Example4" class="form-control form-control-lg" name="loginpass"
                                placeholder="Password" />
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div
            class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
            <!-- Copyright -->
            <div class="text-white mb-3 mb-md-0">
                Copyright © 2022. All rights reserved.
            </div>
            <!-- Copyright -->
    </section>
</body>

</html>