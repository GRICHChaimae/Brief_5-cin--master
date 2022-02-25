<?php 

    require_once 'db.php';

    class Account {

                //$data parameter
        static public function addaccount(){
            
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            
            $stmt = DB::connect()->prepare('INSERT INTO accounts (nom,prenom,email,pass) VALUES (:nom,:prenom,:email,:pass)');
            $executed = $stmt->execute(["nom"=> $nom,"prenom"=> $prenom,"email"=> $email,"pass"=> $pass]);

            if($executed){
                return 'ok';
            }else{
                return 'error';
            }
            $stmt = null;

        }

        
        static public function LoginIn($data){
            
            $qr="SELECT * FROM accounts WHERE email LIKE '".$data['email']."'";

            $res=DB::connect()->query($qr);

            if($row=$res->fetch(PDO::FETCH_ASSOC)){
                
                if($row['pass']==$data['motpass']){
                    $_SESSION["user_id"] =$row['id'] ;
                    $_SESSION["userName"] =$row['nom'].' '.$row['prenom'];
                    return 'ok';
                }
                else{
                    return "Password is not valid!";
                }
            }
            else{

                return "no account with this email";
            }

            //$stmt = DB::connect()->prepare('SELECT * FROM accounts');
            // $stmt->execute();
            // return $stmt->fetchAll();
            // $stmt = null;
        }

    }










    