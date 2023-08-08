<html>
<style>
    h4
    { 
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 250%;
        text-shadow: 2px 2px rgb(128, 126, 123);
    }
    p{
        text-align: justify;
    }
    body{background-color: peachpuff; font-size: 110%;}
    .container {
  display: flex;
  align-items: center;
  justify-content: center
}
.btns{
    border-color: brown;
    font-size: 15px; margin-left: 1%;
    background-color: orange;
    border-radius: 9px;
    padding:1%;
}
figure {
  max-width: 100%
}

.imageRight {
  flex-basis: 40%
}
.imageLeft{
flex-basis: 70%;
        order: 2;
}
.text {
    font-size: 20px;
    padding-left: 2%;
    padding-right: 3%;
    padding-bottom: 2%;
}
#showAni 
{ 
    text-align: center; 
    animation-name: Ani; 
    animation-duration:3s; 
    animation-iteration-count:infinite; 
    height: 200px;
    width: 400px;

    position: fixed;
    top: 50%;
    left: 50%;
    margin-top: -100px;
    margin-left: -200px;
}
@keyframes Ani { from { font-size:200%;} to { font-size:330%; } }
</style>
    <?php
    $name=$_POST["NAME"];
    $age=$_POST["AGE"];
    $phone=$_POST["PHNO"];
    $mail=$_POST["MAIL"];
    $company=$_POST["COMP"];
    $exname=$_POST["EXNAME"];
    $cat=$_POST["CAT"];
    $fileContent2 = file_get_contents($_FILES['f2']['tmp_name']);
    $path="C:/xampp/htdocs/jcomp/suggestions/".$name.$phone.".txt";
    file_put_contents($path,$name."\n".$age."\n".$phone."\n".$mail."\n".$company."\n".$exname."\n".$cat."\n".$fileContent2);
    move_uploaded_file($_FILES["f1"]["tmp_name"],"C:/xampp/htdocs/jcomp/suggestions/".$name.$phone."_".$_FILES["f1"]["name"]);
    ?>
    <h4 align="center" id="showAni">Thank You!!</h4>
</html>