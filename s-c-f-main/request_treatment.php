<?php
include './components/patientHeader/patientHeader.php';
include './db/get-user.php';
include './db/get-diagnosis.php';
include './json-data/treatment-type.php';
include './json-data/allergies.php';


?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>form</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/bfd6d1b072.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
              crossorigin="anonymous">
         <?php patientHeaderLinks();?>
        <link rel="stylesheet" href="css/formStyle.css">
       
        <script src="./js/formScript.js"></script>
        
    </head>
    <body>
    <header>
       <?php patientHeader();?>
    </header>
    <main>
        
        <form id="regForm" method="POST" action="./mainObject.php">
            <h1>Request New Treatment:</h1>
            <div class="tab">
                <h4>personal information</h4>
                <div class="personal-info">
                    <div><label></label>
                        Full Name:
                        <p><input class="not-check-input form-control" value="<?php
                            echo $user["fullName"]
                            ?>" name="fname" disabled></p>

                        Birthday Date
                        <p><input class="not-check-input form-control" type="date" value="<?php
                            echo $user["Birthday"];
                            ?>" name="Bdate" disabled></p>

                        Gender:
                        <div class="radio-opt">
                            <div class="opt"><input class="string-input" type="radio" value="male"
                                                    name="gender" <?php if ($user["gender"] == "male") {
                                    echo "checked";
                                } ?> disabled> male
                            </div>
                            <div class="opt"><input class="string-input" type="radio" value="female"
                                                    name="gender" <?php if ($user["gender"] == "female") {
                                    echo "checked";
                                } ?> disabled> female
                            </div>
                            <div class="opt"><input class="string-input" type="radio" value="male" name="gender"
                                                    <?php if ($user["gender"] == "else") {
                                                        echo "checked";
                                                    } ?>disabled> else
                            </div>
                        </div>
                    </div>

                    <div>
                        ID
                        <p><input class="not-check-input number-input form-control" type="text" value="<?php
                            echo $user["ID"];
                            ?>" name="ID" disabled></p>
                        Email
                        <p><input class="not-check-input form-control" value="<?php
                            echo $user["Email"];
                            ?>" name="email" disabled></p>

                    </div>

                </div>

            </div>
            <?php
            mysqli_free_result($userResult);
            ?>
            <div class="tab">
                <h4>Diagnosis</h4>
                your diagnosis:
                <div class="diagnosis">
                    <div class="diagnosis-select">
                        <select name="diagnosis1">
                            <?php
                            echo $diagnosisOptions
                            ?>
                        </select>

                    </div>
                    <?php
                    mysqli_free_result($diagnosisData);
                    ?>
                    <div class="send-medical-info">
                        <div>
                            by accepting this you give us authority to condition to help you in the best way.agree to
                            send medical information
                            <input type="checkbox" value="agree" name="send-medical-info"
                                   class="send-medical-info-check">
                        </div>
                    </div>
                </div>
            </div>


            <div class="tab">
                <h4>Medical Data:</h4>
                <div class="medical-data">
                    <div class="medical-data-col">
                        <div>treatment method
                            <select id="method" name="method" class="form-select">
                                <?php
                                echo $treatmentTypeOptions;

                                ?>
                            </select>
                        </div>
                        <div>
                            <div class="quest-diet">
                                allergies
                                <select id="allergies" name="allergies" class="dropup form-select">
                                    <?php
                                    echo $allergies;
                                    ?>
                                </select>
                            </div>
                            <label class="quest-diet">what type of food do you like
                                <textarea cols="30" rows="3" name="preferFood" class="form-control"></textarea> </label>
                          
                        </div>


                    </div>
                    <div class="medical-data-col">
                        <div> weight <input class="HW number-input form-control" name="weight"></div>
                        <div>height <input class="HW number-input form-control" name="height"></div>
                        <div class="veg quest-diet"><label>vegetarian</label> <input name="vegetarian" type="checkbox">
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab">
                <h4>Last step:</h4>
                <div class="last-step">
                    <div class="text">
                        comments<br>
                        <textarea cols="50" rows="9" name="comments" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            </div>

            <div class="form-btn">
                <div class="btn-n-p">
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                </div>
            </div>

            <div class="steper">
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
            </div>

        </form>
    </main>
    </body>

    </html>
