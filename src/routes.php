<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {

    $container = $app->getContainer();

    $app->post("/getListUser", function (Request $request, Response $response) use ($container) {
        $sql = "SELECT * FROM user ";
        $stmt = $this->db->prepare($sql);

        try{
            $stmt->execute();
            $result = $stmt->fetchAll();
            $container->get('logger')->info("Success get data list user");
            return $response->withJson(["status" => "success", "data" => $result], 200);
        }catch (Exception $e){
            $container->get('logger')->error($e->getMessage());
            return $response->withJson(["status" => "failed", "data" => "0"], 200);
        }

    });

    $app->post("/getUser", function (Request $request, Response $response) use ($container) {

        $user = $request->getParsedBody();
    
        $sql = "SELECT * FROM user WHERE id = :id";
        $stmt = $this->db->prepare($sql);
    
        $data = [
            ":id" => $user["id"]
        ];
    
        try{
            $stmt->execute($data);
            $result = $stmt->fetchAll();
            $container->get('logger')->info("Success get data user");
            return $response->withJson(["status" => "success", "data" => $result], 200);
        }catch (Exception $e){
            $container->get('logger')->error($e->getMessage());
            return $response->withJson(["status" => "failed", "data" => "0"], 200);
        }
    });

    $app->post("/createUser", function (Request $request, Response $response) use ($container) {

        $user = $request->getParsedBody();
    
        $sql = "INSERT INTO user (id,first_name,last_name,email,account,company_id) VALUE(:id,:first_name,:last_name,:email,:account,:company_id)";
        $stmt = $this->db->prepare($sql);
    
        $data = [
            ":id" => $user["id"],
            ":first_name" => $user["first_name"],
            ":last_name" => $user["last_name"],
            ":email" => $user["email"],
            ":account" => $user["account"],
            ":company_id" => $user["company_id"]
        ];

        try{
            $stmt->execute($data);
            $container->get('logger')->info("Success create data user");
            return $response->withJson(["status" => "success", "data" => "1"], 200);
        }catch (Exception $e){
            $container->get('logger')->error($e->getMessage());
            return $response->withJson(["status" => "failed", "data" => "0"], 200);
        }
    });

    $app->post("/updateUser", function (Request $request, Response $response) use ($container) {

        $user = $request->getParsedBody();
    
        $sql = "UPDATE user SET first_name = :first_name, last_name = :last_name, email=:email, account = :account, company_id = :company_id WHERE id = :id";
        $stmt = $this->db->prepare($sql);
    
        $data = [
            ":id" => $user["id"],
            ":first_name" => $user["first_name"],
            ":last_name" => $user["last_name"],
            ":email" => $user["email"],
            ":account" => $user["account"],
            ":company_id" => $user["company_id"]
        ];

        try{
            $stmt->execute($data);
            $container->get('logger')->info("Success update data user");
            return $response->withJson(["status" => "success", "data" => "1"], 200);
        }catch (Exception $e){
            $container->get('logger')->error($e->getMessage());
            return $response->withJson(["status" => "failed", "data" => "0"], 200);
        }
    });

    $app->post("/deleteUser", function (Request $request, Response $response) use ($container) {

        $user = $request->getParsedBody();
    
        $sql = "DELETE FROM user WHERE id = :id";
        $stmt = $this->db->prepare($sql);
    
        $data = [
            ":id" => $user["id"]
        ];
    
        try{
            $stmt->execute($data);
            $container->get('logger')->info("Success delete data user");
            return $response->withJson(["status" => "success", "data" => "1"], 200);
        }catch (Exception $e){
            $container->get('logger')->error($e->getMessage());
            return $response->withJson(["status" => "failed", "data" => "0"], 200);
        }
    });

    $app->post("/getListCompany", function (Request $request, Response $response) use ($container) {
        $sql = "SELECT * FROM company ";
        $stmt = $this->db->prepare($sql);
    
        try{
            $stmt->execute();
            $result = $stmt->fetchAll();
            $container->get('logger')->info("Success get data list company");
            return $response->withJson(["status" => "success", "data" => $result], 200);
        }catch (Exception $e){
            $container->get('logger')->error($e->getMessage());
            return $response->withJson(["status" => "failed", "data" => "0"], 200);
        }
    });

    $app->post("/getCompany", function (Request $request, Response $response) use ($container) {

        $company = $request->getParsedBody();
    
        $sql = "SELECT * FROM company WHERE id = :id";
        $stmt = $this->db->prepare($sql);
    
        $data = [
            ":id" => $company["id"]
        ];
    
        try{
            $stmt->execute($data);
            $result = $stmt->fetchAll();
            $container->get('logger')->info("Success get data company");
            return $response->withJson(["status" => "success", "data" => $result], 200);
        }catch (Exception $e){
            $container->get('logger')->error($e->getMessage());
            return $response->withJson(["status" => "failed", "data" => "0"], 200);
        }
    });

    $app->post("/createCompany", function (Request $request, Response $response) use ($container) {

        $company = $request->getParsedBody();
    
        $sql = "INSERT INTO company (id,name,address) VALUE(:id,:name,:address)";
        $stmt = $this->db->prepare($sql);
    
        $data = [
            ":id" => $company["id"],
            ":name" => $company["name"],
            ":address" => $company["address"]
        ];
    
        try{
            $stmt->execute($data);
            $container->get('logger')->info("Success create data company");
            return $response->withJson(["status" => "success", "data" => "1"], 200);
        }catch (Exception $e){
            $container->get('logger')->error($e->getMessage());
            return $response->withJson(["status" => "failed", "data" => "0"], 200);
        }
    });

    $app->post("/updateCompany", function (Request $request, Response $response) use ($container) {

        $company = $request->getParsedBody();
    
        $sql = "UPDATE company SET name = :name, address = :address WHERE id = :id";
        $stmt = $this->db->prepare($sql);
    
        $data = [
            ":id" => $company["id"],
            ":name" => $company["name"],
            ":address" => $company["address"]
        ];

        try{
            $stmt->execute($data);
            $container->get('logger')->info("Success update data company");
            return $response->withJson(["status" => "success", "data" => "1"], 200);
        }catch (Exception $e){
            $container->get('logger')->error($e->getMessage());
            return $response->withJson(["status" => "failed", "data" => "0"], 200);
        }
    });

    $app->post("/deleteCompany", function (Request $request, Response $response) use ($container) {

        $company = $request->getParsedBody();
    
        $sql = "DELETE FROM company WHERE id = :id";
        $stmt = $this->db->prepare($sql);
    
        $data = [
            ":id" => $company["id"]
        ];
    
        try{
            $stmt->execute($data);
            $container->get('logger')->info("Success delete data company");
            return $response->withJson(["status" => "success", "data" => "1"], 200);
        }catch (Exception $e){
            $container->get('logger')->error($e->getMessage());
            return $response->withJson(["status" => "failed", "data" => "0"], 200);
        }
    });

    $app->post("/getListBudgetCompany", function (Request $request, Response $response) use ($container) {
        $sql = "SELECT * FROM company_budget ";
        $stmt = $this->db->prepare($sql);
    
        try{
            $stmt->execute();
            $result = $stmt->fetchAll();
            $container->get('logger')->info("Success get data list budget company");
            return $response->withJson(["status" => "success", "data" => $result], 200);
        }catch (Exception $e){
            $container->get('logger')->error($e->getMessage());
            return $response->withJson(["status" => "failed", "data" => "0"], 200);
        }
    });

    $app->post("/getBudgetCompany", function (Request $request, Response $response) use ($container) {

        $company = $request->getParsedBody();
    
        $sql = "SELECT * FROM company_budget WHERE id = :id";
        $stmt = $this->db->prepare($sql);
    
        $data = [
            ":id" => $company["id"]
        ];
    
        try{
            $stmt->execute($data);
            $result = $stmt->fetchAll();
            $container->get('logger')->info("Success get budget company");
            return $response->withJson(["status" => "success", "data" => $result], 200);
        }catch (Exception $e){
            $container->get('logger')->error($e->getMessage());
            return $response->withJson(["status" => "failed", "data" => "0"], 200);
        }
    });

    $app->post("/reimburse", function (Request $request, Response $response) use ($container) {

        $company = $request->getParsedBody();
    
        $sqlCompany = "UPDATE company_budget SET amount = amount - :amount WHERE company_id = :company_id";
        $sqlTransaction = "INSERT INTO transaction (id,type,user_id,amount,date) VALUE (:id,:type,:user_id,:amount,:date)";

        $stmtCompany = $this->db->prepare($sqlCompany);
        $stmtTransaction = $this->db->prepare($sqlTransaction);
    
        $dataCompany = [
            ":amount" => $company["amount"],
            ":company_id" => $company["company_id"]
        ];

        $datatransaction = [
            ":id" => $company["id"],
            ":type" => $company["type"],
            ":user_id" => $company["user_id"],
            ":amount" => $company["amount"],
            ":date" => $company["date"]
        ];
    
        try{
            $stmtCompany->execute($dataCompany);
            $container->get('logger')->info("Success update budget company");
        }catch (Exception $e){
            $container->get('logger')->error($e->getMessage());
            return $response->withJson(["status" => "failed", "data" => "0"], 200);
        }

        try{
            $stmtTransaction->execute($datatransaction);
            $container->get('logger')->info("Success insert budget transaction");
            return $response->withJson(["status" => "success", "data" => "2"], 200);
        }catch (Exception $e){
            $container->get('logger')->error($e->getMessage());
            return $response->withJson(["status" => "failed", "data" => "1"], 200);
        }
    });

    $app->post("/disburse", function (Request $request, Response $response) use ($container) {

        $company = $request->getParsedBody();
    
        $sqlCompany = "UPDATE company_budget SET amount = amount - :amount WHERE company_id = :company_id";
        $sqlTransaction = "INSERT INTO transaction (id,type,user_id,amount,date) VALUE (:id,:type,:user_id,:amount,CAST(':date' as DATE))";

        $stmtCompany = $this->db->prepare($sqlCompany);
        $stmtTransaction = $this->db->prepare($sqlTransaction);
    
        $dataCompany = [
            ":amount" => $company["amount"],
            ":company_id" => $company["company_id"]
        ];

        $datatransaction = [
            ":id" => $company["id"],
            ":type" => $company["type"],
            ":user_id" => $company["user_id"],
            ":amount" => $company["amount"],
            ":date" => $company["date"]
        ];
    
        try{
            $stmtCompany->execute($dataCompany);
            $container->get('logger')->info("Success update budget company");
        }catch (Exception $e){
            $container->get('logger')->error($e->getMessage());
            return $response->withJson(["status" => "failed", "data" => "0"], 200);
        }

        try{
            $stmtTransaction->execute($datatransaction);
            $container->get('logger')->info("Success insert budget transaction");
            return $response->withJson(["status" => "success", "data" => "2"], 200);
        }catch (Exception $e){
            $container->get('logger')->error($e->getMessage());
            return $response->withJson(["status" => "failed", "data" => "1"], 200);
        }
    });

    $app->post("/close", function (Request $request, Response $response) use ($container) {

        $company = $request->getParsedBody();
    
        $sqlCompany = "UPDATE company_budget SET amount = amount - :amount WHERE company_id = :company_id";
        $sqlTransaction = "INSERT INTO transaction (id,type,user_id,amount,date) VALUE (:id,:type,:user_id,:amount,CAST(:date as DATE))";

        $stmtCompany = $this->db->prepare($sqlCompany);
        $stmtTransaction = $this->db->prepare($sqlTransaction);
    
        $dataCompany = [
            ":amount" => $company["amount"],
            ":company_id" => $company["company_id"]
        ];

        $datatransaction = [
            ":id" => $company["id"],
            ":type" => $company["type"],
            ":user_id" => $company["user_id"],
            ":amount" => $company["amount"],
            ":date" => $company["date"]
        ];
    
        try{
            $stmtCompany->execute($dataCompany);
            $container->get('logger')->info("Success update budget company");
        }catch (Exception $e){
            $container->get('logger')->error($e->getMessage());
            return $response->withJson(["status" => "failed", "data" => "0"], 200);
        }

        try{
            $stmtTransaction->execute($datatransaction);
            $container->get('logger')->info("Success insert budget transaction");
            return $response->withJson(["status" => "success", "data" => "2"], 200);
        }catch (Exception $e){
            $container->get('logger')->error($e->getMessage());
            return $response->withJson(["status" => "failed", "data" => "1"], 200);
        }
    });

    $app->post("/getLogTransaction", function (Request $request, Response $response) use ($container) {

        $sql = "SELECT CONCAT(a.first_name,' ',a.last_name) AS user_name, a.account AS account, b.name AS company_name, c.type AS type, 
        c.date AS date, c.amount AS amount,d.amount AS remaining_amount FROM user a JOIN company b ON a.company_id = b.id JOIN transaction c 
        ON a.id = c.user_id JOIN company_budget d ON b.id = d.company_id ORDER BY c.date DESC";
        $stmt = $this->db->prepare($sql);
    
        try{
            $stmt->execute();
            $result = $stmt->fetchAll();
            $container->get('logger')->info("Success get log transaction");
            return $response->withJson(["status" => "success", "data" => $result], 200);
        }catch (Exception $e){
            $container->get('logger')->error($e->getMessage());
            return $response->withJson(["status" => "failed", "data" => "0"], 200);
        }
    });

};
