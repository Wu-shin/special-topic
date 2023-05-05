<?php
    class Specification{
        public $CPU_Number;
        public $MB_Number;
        public $GPU_Number;
        public $Memory_Number;
        public $SSD_Number;
        public $HDD_Number;
        public $Power_Number;
        public $Price;
    }
    function BenchMark_And_MemoryRequire(){
        $SearchTarget = $GLOBALS["SearchTarget"];
        $sql = "Select Software_Memory_Require,Software_Lowest_CPU_Bench,Software_Recommend_CPU_Bench,Software_Lowest_GPU_Bench,Software_Recommend_GPU_Bench FROM ca.soft_list WHERE Software_Name='$SearchTarget[0]' ";
        for($i=1;$i<count($SearchTarget);$i++){
            $sql = $sql."OR Software_Name='$SearchTarget[$i]'";
        }
        $sql = $sql."ORDER By Software_Memory_Require DESC, Software_Lowest_CPU_Bench DESC, Software_Recommend_CPU_Bench DESC, Software_Lowest_GPU_Bench DESC, Software_Recommend_GPU_Bench DESC LIMIT 0 , 1";
        //print($sql);
        $result=mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $sql));
        $GLOBALS["Memory_Require"] = $result["Software_Memory_Require"];
        $GLOBALS["Software_Lowest_CPU_Bench"]=$result["Software_Lowest_CPU_Bench"];
        $GLOBALS["Software_Recommend_CPU_Bench"]=$result["Software_Recommend_CPU_Bench"];
        $GLOBALS["Software_Lowest_GPU_Bench"]=$result["Software_Lowest_GPU_Bench"];
        $GLOBALS["Software_Recommend_GPU_Bench"]=$result["Software_Recommend_GPU_Bench"];
    }
    function BasicTable($CPU_Bench,$GPU_Bench,$TableNumber){
        $Max_Budge = $GLOBALS["Max_Budge"];
        $TargetTable = "Table_".$TableNumber;//Get The Target Revise Table
        //print($TargetTable);
        $Platform = $GLOBALS["Platform"];//Get the Search Platform
        $OC_Mode = $GLOBALS["OC_Mode"];//Get the search OC_Mode
        $CPU_Brand = $GLOBALS["CPU_Brand"];//Get the search CPU Brand
        $GPU_Brand = $GLOBALS["GPU_Brand"];//Get the search GPU Brand
        $Memory_Require = $GLOBALS["Memory_Require"];//Get the Memory Require Capability
        $DDR_Type = $GLOBALS["Memory_DDR"];//Get the DDR Type
        $Price = 0;//Temp Store Price
        $SearchSoftwareType = $GLOBALS["Software_Type"];//Get the Software Type
        $Memory_Channel = $GLOBALS["Memory_Channel"];//Get the Memory channel
        print("\nMemory_Channel: ");print($Memory_Channel);print("\n");
        print("Global Memory Channel");print($GLOBALS["Memory_Channel"]);print("\n");
        $InteVGA_Flag = 0;
        
        //GET CPU
        $CPU_sql= "Select * FROM ca.cpu WHERE cpu_Bench>='$CPU_Bench' AND".$GLOBALS["CPU_InteVGA"]."AND CPU_Platform='$Platform' AND cpu_OC='$OC_Mode' AND (cpu_Brand=".$CPU_Brand. ")ORDER BY cpu_price LIMIT 0,1";
        print($CPU_sql);
        $CPU_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $CPU_sql));
        print_r($CPU_Result);
        $Price = $Price+intval($CPU_Result["cpu_price"]);
        //print($Price);
        CPU_DDR_Supprot($CPU_Result["CPU_Number"]);//Get the CPU DDR Type
        $CPU_InteVGA = $CPU_Result["Inte_VGA"];
        
        //GET GPU
        if($CPU_InteVGA==1&&($SearchSoftwareType!="Entertainment" && $SearchSoftwareType!="VideoEdit" && $SearchSoftwareType!="Animation" &&$SearchSoftwareType!="ArtDraw" && $SearchSoftwareType!="AI_Model")){
            print("\nCPUInteVGA: ");print($CPU_InteVGA);
            $CPU_Name = $CPU_Result["CPU_NAME"];
            //Get InteVGA
            $InteVGA_sql = "Select * From ca.Inte_VGA where CPU_Name='$CPU_Name' ";
            print($InteVGA_sql);
            $InteVGA_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $InteVGA_sql));

            if($InteVGA_Result["VGA_Bench"]>=$GPU_Bench){
                print($InteVGA_Result["Inte_VGA_Name"]);
                $InteVGA_Flag = 1;
            }
            else{//InteVGA Bench < Require Bench
                $GPU_sql = "Select * FROM ca.gpu WHERE gpu_Bench>='$GPU_Bench' AND GPU_Platform='$Platform' AND ( gpu_Brand=".$GPU_Brand. ")ORDER BY gpu_price LIMIT 0,1";
                //print($GPU_sql);
                //print("InteVGA_Group 01");
                $GPU_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $GPU_sql));
                print_r($GPU_Result);
                $Price = $Price+intval($GPU_Result["gpu_price"]);
                $InteVGA_Flag = 0;
            }


        }
        else{
            print("\nCPUInteVGA: ");print($CPU_InteVGA);
            $GPU_sql = "Select * FROM ca.gpu WHERE gpu_Bench>='$GPU_Bench' AND GPU_Platform='$Platform'  AND ( gpu_Brand=".$GPU_Brand. ")ORDER BY gpu_price LIMIT 0,1";
            print("InteVGA_Group 02");
            print($GPU_sql);
            $GPU_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $GPU_sql));
            print_r($GPU_Result);
            $Price = $Price+intval($GPU_Result["gpu_price"]);
            $InteVGA_Flag = 0;
        }
        
        //Memory
        $DDR_Type = $GLOBALS["Memory_DDR"];//Get the DDR Type
        $Memory_sql = "Select * FROM ca.memory WHERE mem_Capacity>='$Memory_Require' AND Memory_Platform='$Platform' AND mem_type=".$DDR_Type." AND mem_channel='$Memory_Channel' ORDER BY mem_price LIMIT 0,1";
        //print($Memory_sql);print("\n");print($Memory_Require);print("GB\n");
        $Memory_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $Memory_sql));
        //print_r($Memory_Result);
        $Price = $Price+intval($Memory_Result["mem_price"]);
        
        //SSD&HDD
        if($Platform=="Desktop"){
            if($SearchSoftwareType=="EngineerDraw" || $SearchSoftwareType=="VideoEdit" || $SearchSoftwareType=="Animation" || $SearchSoftwareType=="ArtDraw"|| $SearchSoftwareType=="AI_Model"){
                $SSD_sql = "Select * FROM ca.ssd WHERE SSD_Capacity>=960 AND type='SSD' ORDER BY ssd_price LIMIT 0 , 1";
                $SSD_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $SSD_sql));
                print_r($SSD_Result);
                $Price = $Price+intval($SSD_Result["ssd_price"]);
                $HDD_sql = "Select * FROM ca.ssd WHERE SSD_Capacity>=4096 AND type='HDD' ORDER BY ssd_price LIMIT 0 , 1";
                $HDD_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $HDD_sql));
                print_r($HDD_Result);
                $Price = $Price+intval($HDD_Result["ssd_price"]);
            }
            else if($SearchSoftwareType=="Entertainment"){
                $SSD_sql = "Select * FROM ca.ssd WHERE SSD_Capacity>=960 AND type='SSD' ORDER BY ssd_price LIMIT 0 , 1";
                $SSD_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $SSD_sql));
                print_r($SSD_Result);
                $Price = $Price+intval($SSD_Result["ssd_price"]);
                $HDD_sql = "Select * FROM ca.ssd WHERE SSD_Capacity>=2048 AND type='HDD' ORDER BY ssd_price LIMIT 0 , 1";
                $HDD_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $HDD_sql));
                print_r($HDD_Result);
                $Price = $Price+intval($HDD_Result["ssd_price"]);
            }
            else{
                $SSD_sql = "Select * FROM ca.ssd WHERE SSD_Capacity>=480 AND type='SSD' ORDER BY ssd_price LIMIT 0 , 1";
                $SSD_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $SSD_sql));
                print_r($SSD_Result);
                $Price = $Price+intval($SSD_Result["ssd_price"]);
                $HDD_sql = "Select * FROM ca.ssd WHERE SSD_Capacity>=1024 AND type='HDD' ORDER BY ssd_price LIMIT 0 , 1";
                $HDD_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $HDD_sql));
                print_r($HDD_Result);
                $Price = $Price+intval($HDD_Result["ssd_price"]);
            }
        }
        else{//Laptop
            if($SearchSoftwareType=="EngineerDraw" || $SearchSoftwareType=="VideoEdit" || $SearchSoftwareType=="Animation" || $SearchSoftwareType=="ArtDraw"|| $SearchSoftwareType=="AI_Model"){
                $SSD_sql = "Select * FROM ca.ssd WHERE SSD_Capacity>=480 AND type='SSD' ORDER BY ssd_price LIMIT 0 , 1";
                print($SSD_sql);
                $SSD_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $SSD_sql));
                print_r($SSD_Result);
                $Price = $Price+intval($SSD_Result["ssd_price"]);
                //$HDD_sql = "Select * FROM ca.ssd WHERE SSD_Capacity>=1024 AND type='HDD' ORDER BY ssd_price LIMIT 0 , 1";
                //$HDD_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $HDD_sql));
                //print_r($HDD_Result);
                //$Price = $Price+intval($HDD_Result["ssd_price"]);
            }
            else if($SearchSoftwareType=="Entertainment"){
                $SSD_sql = "Select * FROM ca.ssd WHERE SSD_Capacity>=960 AND type='SSD' ORDER BY ssd_price LIMIT 0 , 1";
                $SSD_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $SSD_sql));
                print_r($SSD_Result);
                $Price = $Price+intval($SSD_Result["ssd_price"]);
            }
            else{
                $SSD_sql = "Select * FROM ca.ssd WHERE SSD_Capacity>=480 AND type='SSD' ORDER BY ssd_price LIMIT 0 , 1";
                $SSD_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $SSD_sql));
                print_r($SSD_Result);
                $Price = $Price+intval($SSD_Result["ssd_price"]);
            }
        }
        
        //Desktop Power and MB
        if($Platform=="Desktop"){
            //Power Match
            if ($CPU_Result["cpu_ver"]=="R3" || $CPU_Result["cpu_ver"]=="R5"){
                $CPU_Search_Power = "AMD Ryzen 3 / AMD Ryzen 5";
            }
            else if ($CPU_Result["cpu_ver"]=="R7"){
                $CPU_Search_Power = "AMD Ryzen 7";
            }
            else if ($CPU_Result["cpu_ver"]=="R9"){
                $CPU_Search_Power = "AMD Ryzen 9";
            }
            else if ($CPU_Result["cpu_ver"]=="R9"){
                $CPU_Search_Power = "AMD Ryzen 9";
            }
            else if ($CPU_Result["cpu_ver"]=="i3" || $CPU_Result["cpu_ver"]=="i5"){
                $CPU_Search_Power = "Intel Core i3 / Intel Core i5";
            }
            else if ($CPU_Result["cpu_ver"]=="i7"){
                $CPU_Search_Power = "Intel Core i7";
            }
            else if ($CPU_Result["cpu_ver"]=="i9"){
                $CPU_Search_Power = "Intel Core i9";
            }

            if($InteVGA_Flag==1){//Using InteVGA
                $GPU_Search_Power = "Inte_VGA";
            }
            else{//Not Using InteVGA
                $GPU_Search_Power = $GPU_Result["GPU_Name"];
            }
            $Power_sql = "Select * FROM ca.power WHERE pw_CPU='$CPU_Search_Power' AND pw_GPU='$GPU_Search_Power' AND pw_OC='$OC_Mode' LIMIT 0,1";
            print($Power_sql);
            $Power_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $Power_sql));
            print_r($Power_Result);
            $Price = $Price+intval($Power_Result["Power_Price"]);
            print($Price);
            
            //MB Match
            $CPU_Socket_Target = $CPU_Result["CPU_Socket"];
            $MB_sql="Select * FROM ca.mb WHERE MB_CPU_Socket = '$CPU_Socket_Target' AND mb_Brand=".$CPU_Brand. " AND mem_support=".$DDR_Type." ORDER BY mb_price LIMIT 0,1";
            //print($MB_sql);
            $MB_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $MB_sql));
            $Price = $Price+intval($MB_Result["mb_price"]);
            print_r($MB_Result);
        }
        
        /*Update Table*/
        //CPU
        $GLOBALS[$TargetTable]->CPU_Number=$CPU_Result["CPU_Number"];//Fill CPU in Target Table
        $GLOBALS["CPU_Target_Search"]=$CPU_Result["cpu_Bench"];
        $GLOBALS["CPU_Price"]=$CPU_Result["cpu_price"];
        
        //MB
        if($Platform=="Desktop"){
            $GLOBALS[$TargetTable]->MB_Number=$MB_Result["MB_Number"];
            $GLOBALS["MB_Price"]=$MB_Result["mb_price"];
            $GLOBALS["MB_Target_Search_Number"] = $MB_Result["MB_Number"];
        }//Fill MB in Target Table
        else{
            $GLOBALS[$TargetTable]->MB_Number="N/A";
            $GLOBALS["MB_Price"]=0;
        }//Deal With Laptop MB
        
        //GPU
        if($InteVGA_Flag==1){//Using InteVGA
            $GLOBALS[$TargetTable]->GPU_Number = $InteVGA_Result["Inte_VGA_Name"];
            $GLOBALS["GPU_Target_Search"] = $InteVGA_Result["VGA_Bench"];
            $GLOBALS["GPU_Price"] = 0;//InteVGA Without Price
        }
        else{
            $GLOBALS[$TargetTable]->GPU_Number=$GPU_Result["GPU_Number"];//Fill GPU in Target Table
            $GLOBALS["GPU_Target_Search"]=$GPU_Result["gpu_Bench"];
            $GLOBALS["GPU_Price"] = $GPU_Result["gpu_price"];
        }
        
        
        //Memory
        $GLOBALS[$TargetTable]->Memory_Number=$Memory_Result["mem_Number"];//Fill Memory in Target Table
        if($Memory_Result["mem_Capacity"] && $Memory_Result["mem_Capacity"]>=$Memory_Require){
            $GLOBALS["Memory_Target_Search"] = $Memory_Result["mem_Capacity"];
        }
        //$GLOBALS["Memory_Channel"] = $Memory_Result["mem_channel"];
        $GLOBALS["Memory_Price"] = $Memory_Result["mem_price"];
        
        //SSD
        $GLOBALS[$TargetTable]->SSD_Number=$SSD_Result["ssd_Number"];//Fill SSD in Target Table
        $GLOBALS["SSD_Target_Search"] = $SSD_Result["SSD_Capacity"];
        $GLOBALS["SSD_Price"] = $SSD_Result["ssd_price"];
        $GLOBALS["SSD_Target_Speed"]= ($SSD_Result["ssd_speed_Write"]+$SSD_Result["ssd_speed_Read"])/2;
        
        //HDD
        if($HDD_Result){
            $GLOBALS[$TargetTable]->HDD_Number=$HDD_Result["ssd_Number"];//Fill HDD in Targrt Table
            $GLOBALS["HDD_Target_Search"] = $HDD_Result["SSD_Capacity"];
            $GLOBALS["HDD_Price"] = $HDD_Result["ssd_price"];
        }//Deal with HDD may not exist
        else{
            $GLOBALS[$TargetTable]->HDD_Number="N/A";//Fill HDD in Targrt Table
            $GLOBALS["HDD_Target_Search"] = 0;
            $GLOBALS["HDD_Price"] = 0;
        }
        
        //Power
        if($Platform=="Desktop"){
            $GLOBALS[$TargetTable]->Power_Number=$Power_Result["power_Number"];
            $GLOBALS["Power_Price"] = $Power_Result["Power_Price"];
        }//Deal with Desktop Power
        else{
            $GLOBALS[$TargetTable]->Power_Number="N/A";
            $GLOBALS["Power_Price"] = 0;
        }//Deal with Notebook Without Power
        $GLOBALS[$TargetTable]->Price = $Price;
        return;
    }
    function ResetGlobal(){
        //Search_Temp
        $GLOBALS["CPU_Target_Search"] = 0;
        $GLOBALS["GPU_Target_Search"] = 0;
        $GLOBALS["Memory_Target_Search"] = 0;
        $GLOBALS["SSD_Target_Search"] = 0;
        $GLOBALS["SSD_Target_Speed"]=0;
        $GLOBALS["HDD_Target_Search"] = 0;
        $GLOBALS["Memory_DDR"] = "";
        $GLOBALS["MB_Target_Search_Number"] = 0;

        //Temp Price
        $GLOBALS["CPU_Price"] = 0;
        $GLOBALS["GPU_Price"] = 0;
        $GLOBALS["Memory_Price"] = 0;
        $GLOBALS["SSD_Price"] = 0;
        $GLOBALS["HDD_Price"] = 0;
        $GLOBALS["MB_Price"] = 0;
        $GLOBALS["Power_Price"] = 0;
    }
    function TotalPrice():int{
        $Total = $GLOBALS["CPU_Price"]+$GLOBALS["GPU_Price"]+$GLOBALS["Memory_Price"]+$GLOBALS["SSD_Price"]+$GLOBALS["HDD_Price"]+$GLOBALS["MB_Price"]+$GLOBALS["Power_Price"];
        return $Total;
    }
    function CPU_DDR_Supprot($CPUNumber){
        //GET CPU
        $CPU_sql= "Select * FROM ca.cpu WHERE CPU_Number='$CPUNumber' ";
        $CPU_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $CPU_sql));
        $Max_Budge = $GLOBALS["Max_Budge"];
        $Software_Type = $GLOBALS["Software_Type"];
        //print_r($CPU_Result);
        if($CPU_Result["DDR4_Support"]&&$CPU_Result["DDR5_Support"]&&$Max_Budge>=50000&&($Software_Type=="Entertainment"||$Software_Type=="VideoEdit"||$Software_Type=="Animation"||$Software_Type=="ArtDraw" ||$Software_Type=="AI_Model")){
            $GLOBALS["Memory_DDR"] = "'DDR5'";
        }//Gaming Force Using DDR5
        else if($CPU_Result["DDR4_Support"]&&$CPU_Result["DDR5_Support"]&&$Max_Budge>=60000&&($Software_Type!="Entertainment"&&$Software_Type!="VideoEdit"&&$Software_Type!="Animation"&&$Software_Type!="ArtDraw" &&$Software_Type!="AI_Model")){
            $GLOBALS["Memory_DDR"] = "'DDR5'";
        }
        else if($CPU_Result["DDR4_Support"]==1&&$CPU_Result["DDR5_Support"]==0){
            $GLOBALS["Memory_DDR"] = "'DDR4'";
        }//Only Support DDR4
        else if($CPU_Result["DDR4_Support"]==0&&$CPU_Result["DDR5_Support"]==1){
            $GLOBALS["Memory_DDR"] = "'DDR5'";
        }//Only Support DDR5
        else{
            $GLOBALS["Memory_DDR"] = "'DDR4'";
        }
    }
    function InteVGACheck($TableNumber){
        //Get the current Table
        $TargetTable = "Table_".$TableNumber;//Get The Target Revise Table
        $CPUNumber = $GLOBALS[$TargetTable]->CPU_Number;

        //GET CPU
        $CPU_sql= "Select * FROM ca.cpu WHERE CPU_Number='$CPUNumber' ";
        $CPU_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $CPU_sql));
        if ($CPU_Result["Inte_VGA"]==0){//NO InteVGA
            return false;
        }
        else{//equipped with InteVGA
            //Update Table Information
            $CPU_Name = $CPU_Result["CPU_NAME"];
            $InteVGA_sql = "Select * From ca.Inte_VGA where CPU_Name='$CPU_Name' ";
            $InteVGA_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $InteVGA_sql));
            $CPU_sql_2 = "Select RIGHT"."(CPU_NAME,1)"." FROM ca.cpu WHERE CPU_NAME = '$CPU_Name'";
            $CPU_Class = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $CPU_sql_2));
            if($InteVGA_Result){
                /*$GLOBALS[$TargetTable]->GPU_Number = $InteVGA_Result["Inte_VGA_Name"];
                $GLOBALS["GPU_Target_Search"] = $InteVGA_Result["VGA_Bench"];
                $GLOBALS["GPU_Price"] = 0;//InteVGA Without Price*/
                //print("\n");
                //print($CPU_Result["cpu_ver"]);
                return true;
            }
            else if($CPU_Result["CPU_Platform"]=="Laptop" && $CPU_Result["cpu_Brand"]=="AMD"&&($CPU_Class=="X"||$CPU_Class=="S"||$CPU_Class=="H")){
                return false;
            }
            else if($CPU_Result["CPU_Platform"]=="Laptop" && $CPU_Result["cpu_Brand"]=="intel"&&($CPU_Class=="X"||$CPU_Class=="S")){
                return false;
            }
            else if($CPU_Result["CPU_Platform"]=="Laptop" && ($CPU_Result["cpu_ver"]!="i9"  || $CPU_Result["cpu_ver"]!="R9")){
                return false;
            }
            else{
                print("\n");
                print($CPU_Result["cpu_ver"]);
                return false;
            }
            
        }
    }
    function GenerateFeatSpecification($TableNumber){
        print("\nGenerateFeatSpecification\n");
        $TargetTable = "Table_".$TableNumber;
        $Max_Budge = $GLOBALS["Max_Budge"];
        $Platform = $GLOBALS["Platform"];
        $Software_Type = $GLOBALS["Software_Type"];
        print("\n==================================================================\n");
        print_r($GLOBALS[$TargetTable]);
        $ReviseTime = 0;
        $Same_Tag = 0;
        while(1){
            //print("\nTimes: ");
            //print($ReviseTime);
            $Price_1 = TotalPrice();
            print("\nTotla Price_1: ");print($Price_1);
            print("\nCPU_Match");CPUMatch($TableNumber);print("New_Price: ");print(TotalPrice());
            //Get CPU InteVGA
            if(InteVGACheck($TableNumber)&&$Platform=="Laptop"&&$Software_Type!="Entertainment" && $Software_Type!="VideoEdit" && $Software_Type!="Animation" && $Software_Type !="ArtDraw"&& $Software_Type !="AI_Model"&&$Max_Budge<=50000&&$ReviseTime<200){
                Inte_VGA($TableNumber);
            }
            else if(InteVGACheck($TableNumber)&&$Platform=="Desktop"&&$Software_Type!="Entertainment" && $Software_Type!="VideoEdit" && $Software_Type!="Animation" && $Software_Type !="ArtDraw"&& $Software_Type !="AI_Model"&&$Max_Budge<=40000&&$ReviseTime<200){
                Inte_VGA($TableNumber);
            }
            else{
                print("\nGPU Match");GPUMatch($TableNumber);print("New_Price: ");print(TotalPrice());
            }
            print("\nMemory Match");MemoryMatch($TableNumber);print("New_Price: ");print(TotalPrice());
            if($ReviseTime%2==0){//Every three times Update not important component
                if($GLOBALS["SSD_Target_Search"]>1024 && $ReviseTime%5!=0){
                    //Do Not Update SSD
                }
                else{
                    print("\nSSD Match");SSD_HDD_Match("SSD",$TableNumber);print("New_Price: ");print(TotalPrice());
                }//Try Too Many Times
                if($Platform=="Desktop"){//Only Desktop Using HDD
                    if(($GLOBALS["HDD_Target_Search"]>2048 && $ReviseTime%5!=0)){
                        //Do Not Update HDD
                    }
                    else if($GLOBALS["HDD_Target_Search"]>=4096){
                        
                    }
                    else{
                        print("\nHDD Match");SSD_HDD_Match("HDD",$TableNumber);print("New_Price: ");print(TotalPrice());
                    }//Try Too Many Times
                }
                else{

                }//Laptop Not Using HDD
                
                print("\nMB Match");MBMatch($TableNumber);print("New_Price: ");print(TotalPrice());
            }
            else{
                
            }
            print("\n==================================================================\n");print_r($GLOBALS[$TargetTable]);
            $Price_2 = TotalPrice();
            $ReviseTime = $ReviseTime + 1;
            if($Price_1==$Price_2) {
                $Same_Tag = $Same_Tag + 1;
            }
            if($Price_1==$Price_2 && $ReviseTime%2 == 1 && $Same_Tag>50){
                break;
            }
            else{
                //print("\nSecond Round: ");
                continue;
            }
        }
        print("\n==================================================================\n");
        print("\nFinish\n");
        print($ReviseTime);
        return;
    }
    function CPUMatch($TableNumber){
        print("\n===============================================================================================\n");
        $CPU_Bench_Require = $GLOBALS["Software_Lowest_CPU_Bench"];
        $CPU_Search_Bench = $GLOBALS["CPU_Target_Search"];
        $Max_Budge = $GLOBALS["Max_Budge"];
        if($CPU_Bench_Require>=$CPU_Search_Bench){
            $CPU_Search_Bench = $CPU_Bench_Require;
        }
        //print("\nCPU_Search_Bench: ");print($CPU_Search_Bench);
        
        $CPU_Search_Brand = $GLOBALS["CPU_Brand"];
        //print("\nCPU_Search_Brand: ");print($CPU_Search_Brand);
        
        $CPU_Platform = $GLOBALS["Platform"];
        //print("\nCPU_Paltform: ");print($CPU_Platform);
        
        $CPU_OC = $GLOBALS["OC_Mode"];
        //print("\nCPU_OC: ");print($CPU_OC);
        
        $Max_Budge = $GLOBALS["Max_Budge"];
        //print("\nMax_Budge: ");print($Max_Budge);

        if($Max_Budge<20000){
            $CPU_sql = "Select * FROM ca.cpu WHERE ".$GLOBALS["Performance_Group"]." AND cpu_Bench>'$CPU_Search_Bench' AND".$GLOBALS["CPU_InteVGA"]."  AND CPU_Platform='$CPU_Platform'  AND (cpu_Brand=".$CPU_Search_Brand. ")ORDER BY cpu_price LIMIT 0,1";
        }
        else{
            $CPU_sql = "Select * FROM ca.cpu WHERE ".$GLOBALS["Performance_Group"]." AND cpu_Bench>'$CPU_Search_Bench' AND".$GLOBALS["CPU_InteVGA"]." AND CPU_Platform='$CPU_Platform'  AND (cpu_Brand=".$CPU_Search_Brand. ")ORDER BY cpu_price LIMIT 0,1";
        }
        
        print($CPU_sql);
        
        $CPU_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $CPU_sql));
        //print($CPU_Result);
        
        if ($CPU_Result){//Exist Result
            $CPU_Name = $CPU_Result["CPU_NAME"];
            print_r($CPU_Result);
            if ($CPU_Platform=="Desktop"){
                print("\nDesktop Power");
                $Power_New_Price = PowerPriceCheck("CPU",$CPU_Result["CPU_Number"],1);//Get the Power Price
            }
            else{
                print("\nLaptop Power");
                $Power_New_Price = 0;
            }
            //print("\nPower_New_Price: ");print($Power_New_Price);
            
            //Get DDR
            CPU_DDR_Supprot($CPU_Result["CPU_Number"]);//Update DDR
            print("\nDDR_Support: ");print($GLOBALS["Memory_DDR"]);
            
            //Check MB Price
            if ($CPU_Platform=="Desktop"){
                print("\nDesktop MB");
                $MB_New_Price = MBPriceCheck($CPU_Result["CPU_Number"],1);//Get the MB Price
            }//Desktop MB
            else{
                print("\nLaptop MB");
                $MB_New_Price = 0;
            }//Laptop MB 0
            //print("\nMB_New_Price: ");print($MB_New_Price);
            
            $CPU_sql_2 = "Select RIGHT"."(CPU_NAME,1)"." FROM ca.cpu WHERE CPU_NAME = '$CPU_Name'";
            $CPU_Class = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $CPU_sql_2));

            //Laptop High Performance CPU Associate GPU
            if(($CPU_Platform=="Laptop" && $CPU_Result["cpu_ver"]=="i9" )|| $CPU_Result["Inte_VGA"]==1){
                if(!GPU_Associate_Check($CPU_Result["CPU_Number"],$TableNumber)){
                    return;
                }
                else{

                }
            }
            else if($CPU_Platform=="Laptop" && $CPU_Result["cpu_Brand"]=="AMD"&&($CPU_Class=="X"||$CPU_Class=="S"||$CPU_Class=="H")){
                if(!GPU_Associate_Check($CPU_Result["CPU_Number"],$TableNumber)){
                    return;
                }
                else{

                }
            }
            else if($CPU_Platform=="Laptop" && $CPU_Result["cpu_Brand"]=="intel"&&($CPU_Class=="X"||$CPU_Class=="S")){
                if(!GPU_Associate_Check($CPU_Result["CPU_Number"],$TableNumber)){
                    return;
                }
                else{

                }
            }
            else if ($CPU_Platform=="Laptop" && $CPU_Result["cpu_ver"]=="R9"){
                if(!GPU_Associate_Check($CPU_Result["CPU_Number"],$TableNumber)){
                    return;
                }
                else{
                    
                }
            }
            else{

            }


            $CPU_New_Price = intval($CPU_Result["cpu_price"]);
            //print("\nCPU_New_Price: ");print($CPU_New_Price);
            
            $NewTempPrice = TotalPrice()-$GLOBALS["MB_Price"]-$GLOBALS["Power_Price"]-$GLOBALS["CPU_Price"]+$Power_New_Price+$MB_New_Price+$CPU_New_Price;
            print("\nNewTempPrice: ");print($NewTempPrice);
            
            //print($NewTempPrice);
            if($NewTempPrice>$Max_Budge){//CPU Over the Max Budge
                print("\nCPU Over Budge\n");
                $TargetTable = "Table_".$TableNumber;//Get The Target Revise Table
                CPU_DDR_Supprot($GLOBALS[$TargetTable]->CPU_Number);
                return; 
            }
            else{                
                $TargetTable = "Table_".$TableNumber;//Get The Target Revise Table
                $GLOBALS[$TargetTable]->CPU_Number=$CPU_Result["CPU_Number"];//Update CPU Number in Target Table
                $GLOBALS["CPU_Target_Search"]=$CPU_Result["cpu_Bench"];//Update CPU Temp Search Bench
                $GLOBALS["CPU_Price"]=$CPU_Result["cpu_price"];//Update CPU Temp Search Price
                GPU_Year_Check($TableNumber);
                if ($CPU_Platform=="Desktop"){
                    //Direct Update MB Information
                    $MB_Number = $GLOBALS[$TargetTable]->MB_Number=$GLOBALS["MB_Target_Search_Number"];
                    $MB_sql = "Select * FROM ca.mb WHERE MB_Number='$MB_Number'";
                    $MB_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $MB_sql));
                    $GLOBALS["MB_Price"] = $MB_Result["mb_price"];
                    PowerMatch($TableNumber);//Direct Update Power Information
                }//Desktop MB And Power Update 
                else{
                    
                }//Laptop MB And Power NOT Update
                $GLOBALS[$TargetTable]->Price=TotalPrice();
                return;
            }
        }
        else{//No Match CPU Result
            print("\nNO Match\n");
            //Skip
            return;
        }
    }//Check Match CPU //Pass
    function GPUMatch($TableNumber){
        print("\n====================================================================================================");
        $GPU_Bench_Require = $GLOBALS["Software_Lowest_GPU_Bench"];
        $GPU_Search_Bench = $GLOBALS["GPU_Target_Search"];
        //print("\n");print($GPU_Search_Bench);
        if($GPU_Bench_Require>=$GPU_Search_Bench){
            $GPU_Search_Bench = $GPU_Bench_Require;
        }
        
        $GPU_Search_Brand = $GLOBALS["GPU_Brand"];
        //print("\n");print($GPU_Search_Brand);
        
        $GPU_Platform = $GLOBALS["Platform"];
        //print("\n");print($GPU_Platform);
        
        //$GPU_OC = $GLOBALS["OC_Mode"];
        //print("\n");print($GPU_OC);
        
        $Max_Budge = $GLOBALS["Max_Budge"];
        //print("\n");print($Max_Budge);

        //Get CPU Year
        $Year_Search = $GLOBALS["CPU_Year"];
        
        $GPU_sql = "Select * FROM ca.gpu WHERE ".$GLOBALS["Performance_Group"]." AND gpu_Bench>'$GPU_Search_Bench' AND gpu_year<='$Year_Search' AND GPU_Platform='$GPU_Platform' AND ( gpu_Brand=".$GPU_Search_Brand. ")ORDER BY gpu_price LIMIT 0,1";
        print("\n");print($GPU_sql);
        
        $GPU_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $GPU_sql));
        //print("\n");print_r($GPU_Result);
        
        if ($GPU_Result){//Exist Result
            print("\n");print_r($GPU_Result);
            if($GPU_Platform=="Desktop"){
                $Power_New_Price = PowerPriceCheck("GPU",$GPU_Result["GPU_Number"],1);//Get the Power Price
            }
            else{
                $Power_New_Price = 0;
            }
            //print("\nPower_New_Price: ");print($Power_New_Price);
            
            $GPU_New_Price = intval($GPU_Result["gpu_price"]);
            //print("\nGPU_New_Price: ");print($GPU_New_Price);
            
            $NewTempPrice = TotalPrice()-$GLOBALS["Power_Price"]-$GLOBALS["GPU_Price"]+$Power_New_Price+$GPU_New_Price;
            //print("\nNewPrice: ");print($NewTempPrice);
            
            //print($NewTempPrice);
            if($NewTempPrice>$Max_Budge){//GPU Over the Max Budge
                print("\nGPU Over Budge\n");
                return; 
            }
            else{
                $TargetTable = "Table_".$TableNumber;//Get The Target Revise Table
                //print($TargetTable);
                $GLOBALS[$TargetTable]->GPU_Number=$GPU_Result["GPU_Number"];//Update GPU Number in Target Table
                //print("===================================");
                //print($GLOBALS[$TargetTable]->GPU_Number);
                $GLOBALS["GPU_Target_Search"]=$GPU_Result["gpu_Bench"];//Update GPU Temp Search Bench
                $GLOBALS["GPU_Price"]=$GPU_Result["gpu_price"];//Update GPU Temp Search Price
                if($GPU_Platform=="Desktop"){
                    PowerMatch($TableNumber);
                }//Desktop GPU Update
                else{}
                $GLOBALS[$TargetTable]->Price=TotalPrice();
                return;
            }
        }
        else{//No Match GPU Result
            print("NO Match");
            //Skip
            return;
        }
    }//Check Match GPU  //Pass
    function Inte_VGA($TableNumber){
        print("\n====================================================================================================\n");
        print("InteVGA\n");
        $TargetTable = "Table_".$TableNumber;//Get The Target Revise Table
        $CPUNumber = $GLOBALS[$TargetTable]->CPU_Number;

        //GET CPU
        $CPU_sql= "Select * FROM ca.cpu WHERE CPU_Number='$CPUNumber' ";
        $CPU_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $CPU_sql));
        $CPU_Name = $CPU_Result["CPU_NAME"];

        //Get InteVGA
        $InteVGA_sql = "Select * From ca.Inte_VGA where CPU_Name='$CPU_Name' ";
        $InteVGA_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $InteVGA_sql));
        $GLOBALS[$TargetTable]->GPU_Number = $InteVGA_Result["Inte_VGA_Name"];
        $GLOBALS["GPU_Target_Search"] = $InteVGA_Result["VGA_Bench"];
        $GLOBALS["GPU_Price"] = 0;//InteVGA Without Price
        return;
    }
    function MemoryMatch($TableNumber){
        print("\n====================================================================================\n");
        $Memory_Require = $GLOBALS["Memory_Require"];
        $Memory_Search_Capacity = $GLOBALS["Memory_Target_Search"];//GB
        if($Memory_Require>=$Memory_Search_Capacity){
            $Memory_Search_Capacity = $Memory_Require;
        }
        $Memory_Platform = $GLOBALS["Platform"];//Platform
        $Max_Budge = $GLOBALS["Max_Budge"];//Max Budge
        $DDR_TYPE = $GLOBALS["Memory_DDR"];//DDR5
        $MemoryCurrentPrice = $GLOBALS["Memory_Price"];//Get the Current Memory Price
        
        $Memory_sql = "Select * FROM ca.memory WHERE mem_Capacity>='$Memory_Search_Capacity' AND Memory_Platform='$Memory_Platform' AND mem_type=".$DDR_TYPE." AND mem_price>'$MemoryCurrentPrice' ORDER BY mem_price LIMIT 0,1";
        print($Memory_sql);
        $Memory_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $Memory_sql));
        //print_r($Memory_Result);

        if ($Memory_Result){//Exist Result
            print_r($Memory_Result);
            $Memory_New_Price = intval($Memory_Result["mem_price"]);
            //print("\nMemory_New_Price: ");print($Memory_New_Price);
            
            $NewTempPrice = TotalPrice()-$GLOBALS["Memory_Price"]+$Memory_New_Price;
            //print("\nNewTempPrice: ");print($NewTempPrice);
            //print($NewTempPrice);
            if($NewTempPrice>$Max_Budge){//Memory Over the Max Budge
                print("\nMemory Over Budge\n");
                return; 
            }
            else{
                $TargetTable = "Table_".$TableNumber;//Get The Target Revise Table
                $GLOBALS[$TargetTable]->Memory_Number=$Memory_Result["mem_Number"];//Update Memory Number in Target Table
                $GLOBALS["Memory_Target_Search"]=$Memory_Result["mem_Capacity"];//Update Memory Temp Search Capacity
                $GLOBALS["Memory_Price"]=$Memory_Result["mem_price"];//Update Memory Temp Search Price
                $GLOBALS[$TargetTable]->Price=TotalPrice();
                return;
            }
        }
        else{//No Match Memory Result
            print("NO Match");
            //Skip
            return;
        }
    }//Check Match Memory   //Pass
    function SSD_HDD_Match($SSD_HDD_Mode,$TableNumber){
        print("\n====================================================================================\n");
        $Max_Budge = $GLOBALS["Max_Budge"];//Max Budge
        if($SSD_HDD_Mode=="SSD"){//Search SSD
            $SSD_Capacity = $GLOBALS["SSD_Target_Search"];//Get Capacity
            $SSD_Speed = $GLOBALS["SSD_Target_Speed"];
            $SSD_Current_Price = $GLOBALS["SSD_Price"];
            $SSD_sql = "Select * FROM ca.ssd WHERE SSD_Capacity>='$SSD_Capacity' AND (ssd_speed_Write+ssd_speed_Read)/2>'$SSD_Speed' AND type='SSD' AND ssd_price>='$SSD_Current_Price' ORDER BY ssd_price LIMIT 0 , 1";
            //print($SSD_sql);
            $SSD_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $SSD_sql));
            if($SSD_Result){//Exist SSD Result
                print_r($SSD_Result);
                $SSD_New_Price = intval($SSD_Result["ssd_price"]);
                $NewTempPrice = TotalPrice()-$GLOBALS["SSD_Price"]+$SSD_New_Price;
                if($NewTempPrice>$Max_Budge){
                    print("\nOver Budge\n");
                    return;
                }
                else{
                    $TargetTable = "Table_".$TableNumber;//Get The Target Revise Table
                    $GLOBALS[$TargetTable]->SSD_Number=$SSD_Result["ssd_Number"];//Update SSD Number in Target Table
                    $GLOBALS["SSD_Target_Search"]=$SSD_Result["SSD_Capacity"];//Update SSD Temp Search Capacity
                    $GLOBALS["SSD_Target_Speed"]=($SSD_Result["ssd_speed_Write"]+$SSD_Result["ssd_speed_Read"])/2;//Update SSD Temp Search Speed
                    $GLOBALS["SSD_Price"]=$SSD_Result["ssd_price"];//Update SSD Temp Price
                    $GLOBALS[$TargetTable]->Price=TotalPrice();
                    return;
                }
            }
            else{//Not Exist SSD Result
                print("NO Match");
                //Skip
                return;
            }
        }
        else{//Search HDD
            $HDD_Capacity = $GLOBALS["HDD_Target_Search"];//Get Capacity
            $HDD_sql = "Select * FROM ca.ssd WHERE SSD_Capacity>'$HDD_Capacity' AND type='HDD' ORDER BY ssd_price LIMIT 0 , 1";
            $HDD_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $HDD_sql));
            if($HDD_Result){//Exist HDD Result
                print_r($HDD_Result);
                $HDD_New_Price = intval($HDD_Result["ssd_price"]);
                $NewTempPrice = TotalPrice()-$GLOBALS["HDD_Price"]+$HDD_New_Price;
                if($NewTempPrice>$Max_Budge){
                    print("\nOver Budge\n");
                    return;
                }
                else{
                    $TargetTable = "Table_".$TableNumber;//Get The Target Revise Table
                    $GLOBALS[$TargetTable]->HDD_Number=$HDD_Result["ssd_Number"];//Update HDD Number in Target Table
                    $GLOBALS["HDD_Target_Search"]=$HDD_Result["SSD_Capacity"];//Update HDD Temp Search Capacity
                    $GLOBALS["HDD_Price"]=$HDD_Result["ssd_price"];//Update HDD Temp Price
                    $GLOBALS[$TargetTable]->Price=TotalPrice();
                    return;
                }
            }
            else{//Not Exist HDD Result
                print("NO Match");
                //Skip
                return;
            }
        }
    }//Check SSD OR HDD 
    function MBMatch($TableNumber){
        print("\n====================================================================================\n");
        $TargetTable = "Table_".$TableNumber;//Get The Target Revise Table
        $OC_Mode = $GLOBALS["OC_Mode"];
        $Max_Budge = $GLOBALS["Max_Budge"];//Max Budge
        $MB_Current_Price = $GLOBALS["MB_Price"];//MB Current Price
        //print("\nMB_Current_Price");print($MB_Current_Price);

        //CPU Information
        $CPU_Number = $GLOBALS[$TargetTable]->CPU_Number;//Get CPU Number in Target Table
        //print("\nCPU_Number:");print($CPU_Number);
        $CPU_sql= "Select * FROM ca.cpu WHERE CPU_Number= '$CPU_Number' ";
        //print("\n");print($CPU_sql);
        $CPU_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $CPU_sql));
        //print("\n");print_r($CPU_Result);
        $CPU_Search_Socket = $CPU_Result["CPU_Socket"];
        
        //Memory Information
        $Memory_Number = $GLOBALS[$TargetTable]->Memory_Number;//Get Memory Number in Target Table
        //print("\n");print("Memory_Number");
        $Memory_sql = "Select * FROM ca.memory WHERE mem_Number = '$Memory_Number' ";
        //print("\n");print($Memory_sql);
        $Memory_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $Memory_sql));
        //print("\n");print_r($Memory_Result);
        $DDR_Search_Type = $Memory_Result["mem_type"];
        
        //MB Information
        $MB_sql = "Select * FROM ca.mb WHERE ".$GLOBALS["Performance_Group"]." AND MB_CPU_Socket = '$CPU_Search_Socket' AND mem_support='$DDR_Search_Type' AND mb_price>'$MB_Current_Price' ORDER BY mb_price LIMIT 0,1";
        print($MB_sql);
        $MB_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $MB_sql));
        
        if($MB_Result){//Exist a result
            print_r($MB_Result);
            $MB_New_Price = intval($MB_Result["mb_price"]);
            $NewTempPrice = TotalPrice()-$GLOBALS["MB_Price"]+$MB_New_Price;
            if ($NewTempPrice>$Max_Budge){
                print("\nMB Over Budge\n");
                return;
            }
            else{
                $TargetTable = "Table_".$TableNumber;//Get The Target Revise Table
                $GLOBALS[$TargetTable]->MB_Number=$MB_Result["MB_Number"];//Update MB Number in Target Table
                $GLOBALS["MB_Price"]=$MB_Result["mb_price"];//Update MB Temp Price
                $GLOBALS[$TargetTable]->Price=TotalPrice();
                return;
            }
        }
        else{
            return;
        }
        //MB Update
        //print_r($MB_Result);
        
    }
    function PowerPriceCheck($CPUModeOrGPUMode,$ComponentID,$TableNumber):int{
        //Switch CPU or GPU
        if($GLOBALS["Platform"]=="Laptop"){
            return 0;
        }
        $OC_Mode = $GLOBALS["OC_Mode"];
        if($CPUModeOrGPUMode=="CPU"){
            //Get CPU Name by Using ID
            $CPU_sql= "Select * FROM ca.cpu WHERE CPU_Number= '$ComponentID' ";
            $CPU_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $CPU_sql));
            if ($CPU_Result["cpu_ver"]=="R3" || $CPU_Result["cpu_ver"]=="R5"){
                $CPU_Search_Power = "AMD Ryzen 3 / AMD Ryzen 5";
            }
            else if ($CPU_Result["cpu_ver"]=="R7"){
                $CPU_Search_Power = "AMD Ryzen 7";
            }
            else if ($CPU_Result["cpu_ver"]=="R9"){
                $CPU_Search_Power = "AMD Ryzen 9";
            }
            else if ($CPU_Result["cpu_ver"]=="R9"){
                $CPU_Search_Power = "AMD Ryzen 9";
            }
            else if ($CPU_Result["cpu_ver"]=="i3" || $CPU_Result["cpu_ver"]=="i5"){
                $CPU_Search_Power = "Intel Core i3 / Intel Core i5";
            }
            else if ($CPU_Result["cpu_ver"]=="i7"){
                $CPU_Search_Power = "Intel Core i7";
            }
            else if ($CPU_Result["cpu_ver"]=="i9"){
                $CPU_Search_Power = "Intel Core i9";
            }
            
            //Get GPU Search Target
            $TargetTable = "Table_".$TableNumber;//Get The Target Revise Table
            $Current_Table = $GLOBALS[$TargetTable];
            $GPU_Search_Power = $Current_Table->GPU_Number;

            if(is_numeric($GPU_Search_Power)){
                $GPU_sql = "Select * FROM ca.gpu WHERE GPU_Number='$GPU_Search_Power'";
                $GPU_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $GPU_sql));
                $GPU_Search_Power = $GPU_Result["GPU_Name"];
            }
            else{
                $GPU_Search_Power = "Inte_VGA";
            }
            
            //Search Power
            $Power_sql = "Select * FROM ca.power WHERE pw_CPU='$CPU_Search_Power' AND pw_GPU='$GPU_Search_Power' AND pw_OC='$OC_Mode' LIMIT 0,1";
            $Power_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $Power_sql));
        }
        else if($CPUModeOrGPUMode=="GPU"){
            //Get GPU Name by ID
            $GPU_sql= "Select * FROM ca.gpu WHERE GPU_Number=$ComponentID ";
            $GPU_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $GPU_sql));
            $GPU_Search_Power = $GPU_Result["GPU_Name"];
            
            //Get CPU ver by ID
            $TargetTable = "Table_".$TableNumber;//Get The Target Revise Table
            $Current_Table = $GLOBALS[$TargetTable];
            $CPU_Search_Power = $Current_Table->CPU_Number;
            $CPU_sql = "Select * FROM ca.cpu WHERE CPU_Number='$CPU_Search_Power'";
            $CPU_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $CPU_sql));
            if ($CPU_Result["cpu_ver"]=="R3" || $CPU_Result["cpu_ver"]=="R5"){
                $CPU_Search_Power = "AMD Ryzen 3 / AMD Ryzen 5";
            }
            else if ($CPU_Result["cpu_ver"]=="R7"){
                $CPU_Search_Power = "AMD Ryzen 7";
            }
            else if ($CPU_Result["cpu_ver"]=="R9"){
                $CPU_Search_Power = "AMD Ryzen 9";
            }
            else if ($CPU_Result["cpu_ver"]=="R9"){
                $CPU_Search_Power = "AMD Ryzen 9";
            }
            else if ($CPU_Result["cpu_ver"]=="i3" || $CPU_Result["cpu_ver"]=="i5"){
                $CPU_Search_Power = "Intel Core i3 / Intel Core i5";
            }
            else if ($CPU_Result["cpu_ver"]=="i7"){
                $CPU_Search_Power = "Intel Core i7";
            }
            else if ($CPU_Result["cpu_ver"]=="i9"){
                $CPU_Search_Power = "Intel Core i9";
            }
            
            //Search Power
            $Power_sql = "Select * FROM ca.power WHERE pw_CPU='$CPU_Search_Power' AND pw_GPU='$GPU_Search_Power' AND pw_OC='$OC_Mode' LIMIT 0,1";
            $Power_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $Power_sql));
        }
        return intval($Power_Result["Power_Price"]);
    }
    function MBPriceCheck($ComponentID,$TableNumber):int{
        //print("MBPriceCheck");
        if ($GLOBALS["Platform"]=="Laptop"){
            return 0;
        }
        //Get the Socket by CPU id
        $CPU_sql= "Select * FROM ca.cpu WHERE CPU_Number=$ComponentID ";
        $CPU_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $CPU_sql));
        $Socket = $CPU_Result["CPU_Socket"];
        print("\nNewCPU_ID:");print($Socket);
        
        //Get Current Socket
        $TargetTable = "Table_".$TableNumber;//Get The Target Revise Table
        $Current_Table = $GLOBALS[$TargetTable];
        $Memory_Search = $Current_Table->Memory_Number;
        $MB_Search = $Current_Table->MB_Number;
        $MB_sql_2 = "Select * FROM ca.mb WHERE MB_Number='$MB_Search'";
        //print("\n");
        //print($MB_sql_2);
        $MB_Result_2 = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $MB_sql_2));
        $Current_Socket = $MB_Result_2["MB_CPU_Socket"];print("\nCurrentMB_Socket: ");print($Current_Socket);
        $Current_MB_DDR = $MB_Result_2["mem_support"];print("\nCurrentMB_DDR: ");print($Current_MB_DDR);
        
        $CPU_Brand = $GLOBALS["CPU_Brand"];//Get the CPU Brand
        $OC_Mode = $GLOBALS["OC_Mode"];//Get the OC Mode
        $DDR_Type = $GLOBALS["Memory_DDR"];
        
        //Current DDR
        $Memory_sql = "Select * FROM ca.memory WHERE mem_Number='$Memory_Search'";
        print($Memory_sql);
        $Memory_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $Memory_sql));
        $Current_DDR = $Memory_Result["mem_type"];print("\nCurrentMemory_Number:");print($Current_DDR);
        
        if($Socket == $Current_Socket && $Current_MB_DDR==$Current_DDR){//Current MB Support New CPU and memory
            $GLOBALS["MB_Target_Search_Number"] = $MB_Search;
            return $GLOBALS["MB_Price"];
        }
        else{//Current MB not Support New CPU
            $MB_sql="Select * FROM ca.mb WHERE ".$GLOBALS["Performance_Group"]." AND MB_CPU_Socket = '$Socket' AND mb_Brand=".$CPU_Brand. " AND mem_support=".$DDR_Type." ORDER BY mb_price LIMIT 0,1";
            //print("\n");
            //print($MB_sql);
            $MB_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $MB_sql));
            $GLOBALS["MB_Target_Search_Number"] = $MB_Result["MB_Number"];
            //print($MB_Result["mem_support"]);
            return intval($MB_Result["mb_price"]);
        }
    }
    function PowerMatch($TableNumber){
        $OC_Mode = $GLOBALS["OC_Mode"];
        //Get GPU Search Target
        $TargetTable = "Table_".$TableNumber;//Get The Target Revise Table
        $Current_Table = $GLOBALS[$TargetTable];
        $GPU_Search_Power = $Current_Table->GPU_Number;
        if(is_numeric($GPU_Search_Power)){
            $GPU_sql = "Select * FROM ca.gpu WHERE GPU_Number='$GPU_Search_Power'";
            $GPU_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $GPU_sql));
            $GPU_Search_Power = $GPU_Result["GPU_Name"];
        }
        else{
            $GPU_Search_Power = "Inte_VGA";
        }        
        
        //Get CPU Search Target
        $TargetTable = "Table_".$TableNumber;//Get The Target Revise Table
        $Current_Table = $GLOBALS[$TargetTable];
        $CPU_Search_Power = $Current_Table->CPU_Number;
        $CPU_sql = "Select * FROM ca.cpu WHERE CPU_Number='$CPU_Search_Power'";
        $CPU_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $CPU_sql));
        if ($CPU_Result["cpu_ver"]=="R3" || $CPU_Result["cpu_ver"]=="R5"){
            $CPU_Search_Power = "AMD Ryzen 3 / AMD Ryzen 5";
        }
        else if ($CPU_Result["cpu_ver"]=="R7"){
            $CPU_Search_Power = "AMD Ryzen 7";
        }
        else if ($CPU_Result["cpu_ver"]=="R9"){
            $CPU_Search_Power = "AMD Ryzen 9";
        }
        else if ($CPU_Result["cpu_ver"]=="R9"){
            $CPU_Search_Power = "AMD Ryzen 9";
        }
        else if ($CPU_Result["cpu_ver"]=="i3" || $CPU_Result["cpu_ver"]=="i5"){
            $CPU_Search_Power = "Intel Core i3 / Intel Core i5";
        }
        else if ($CPU_Result["cpu_ver"]=="i7"){
            $CPU_Search_Power = "Intel Core i7";
        }
        else if ($CPU_Result["cpu_ver"]=="i9"){
            $CPU_Search_Power = "Intel Core i9";
        }
            
        //Search Power
        $Power_sql = "Select * FROM ca.power WHERE pw_CPU='$CPU_Search_Power' AND pw_GPU='$GPU_Search_Power' AND pw_OC='$OC_Mode' LIMIT 0,1";
        $Power_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $Power_sql));
        
        //Update Table 
        $TargetTable = "Table_".$TableNumber;//Get The Target Revise Table
        $GLOBALS[$TargetTable]->Power_Number=$Power_Result["power_Number"];//Update Power Number in Target Table
        $GLOBALS["Power_Price"]=$Power_Result["Power_Price"];//Update Power Temp Search Bench
    }
    function ShowComponent($TableNumber){
        $Platform = $GLOBALS["Platform"];
        $TargetTable = "Table_".$TableNumber;
        $Current_Table = $GLOBALS[$TargetTable];
        //Print CPU
        $CurrentCPU_ID = $Current_Table->CPU_Number;
        $CPU_SQL = "Select * FROM ca.cpu WHERE cpu_Number='$CurrentCPU_ID'";
        $CPU_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $CPU_SQL));
        print("\n");print($CPU_Result["CPU_NAME"]);

        //Print MB
        $CurrentMB_ID = $Current_Table->MB_Number;
        if($CurrentMB_ID!="N/A"){
            $MB_SQL = "Select * FROM ca.mb WHERE mb_Number = '$CurrentMB_ID'";
            $MB_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $MB_SQL));
            print("\n");print($MB_Result["MB_Name"]);
        }
        else{
            print("\n");print("N/A");
        }
        
        //Print GPU
        $CurrentGPU_ID = $Current_Table->GPU_Number;
        if(is_numeric($CurrentGPU_ID)){
            $GPU_SQL = "Select * FROM ca.gpu WHERE GPU_Number = '$CurrentGPU_ID'";
            $GPU_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $GPU_SQL));
            print("\n");print($GPU_Result["GPU_Name"]);//Print VGA 
        }
        else{
            print("\n");print($CurrentGPU_ID);//Print InteVGA
        }
        

        //Print Memory
        $CurrentMemory_ID = $Current_Table->Memory_Number;
        $Memory_SQL = "Select * FROM ca.memory WHERE mem_Number = '$CurrentMemory_ID'";
        $Memory_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $Memory_SQL));
        print("\n");print($Memory_Result["Memory_Name"]);

        //Print SSD
        $CurrentSSD_ID = $Current_Table->SSD_Number;
        $SSD_SQL = "Select * FROM ca.ssd WHERE ssd_Number = '$CurrentSSD_ID'";
        $SSD_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $SSD_SQL));
        print("\n");print($SSD_Result["SSD_Name"]);

        //Print HDD
        if($Platform=="Desktop"){
            $CurrentHDD_ID = $Current_Table->HDD_Number;
            $HDD_SQL = "Select * FROM ca.ssd WHERE ssd_Number = '$CurrentHDD_ID'";
            $HDD_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $HDD_SQL));
            print("\n");print($HDD_Result["SSD_Name"]);
        }
        else{
            print("\nN/A");
        }
        

        //Print Power
        $CurrentPower_ID = $Current_Table->Power_Number;
        if($CurrentPower_ID!="N/A"){
            $Power_SQL = "Select * FROM ca.power WHERE power_Number = '$CurrentPower_ID'";
            $Power_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $Power_SQL));
            print("\n");print($Power_Result["pw_W"]);
        }
        print("\n");
        print($Current_Table->Price);
        print("\n==================================================================");
    }
    function PerformanceGroup_Check(){
        $Software_Type = $GLOBALS["Software_Type"];//Entertainment
        $Max_Budge = $GLOBALS["Max_Budge"];//MaxBudge
        $Platform = $GLOBALS["Platform"];//Desktop
        if($Software_Type=="Entertainment" || $Software_Type=="VideoEdit" || $Software_Type=="Animation" ||$Software_Type=="ArtDraw"||$Software_Type=="AI_Model"){
            $GLOBALS["Performance_Group"] = "(Performance_Group ='Performance' OR Performance_Group ='Advance')";//Set to advance and performance
        }
        else if ($Software_Type!="Entertainment" && $Software_Type!="VideoEdit" && $Software_Type!="Animation" && $Software_Type !="ArtDraw" && $Software_Type !="AI_Model"&& $Max_Budge>=40000 && $Platform=="Desktop"){
            $GLOBALS["Performance_Group"] = "(Performance_Group ='Performance' OR Performance_Group ='Advance')";//Set to advance and performance
        }
        else if($Software_Type!="Entertainment" && $Software_Type!="VideoEdit" && $Software_Type!="Animation" && $Software_Type !="ArtDraw" && $Software_Type !="AI_Model"&& $Max_Budge>=50000 && $Platform=="Laptop"){
            $GLOBALS["Performance_Group"] = "(Performance_Group ='Performance' OR Performance_Group ='Advance')";//Set to advance and performance
        }
        else{
            $GLOBALS["Performance_Group"] = "(Performance_Group ='Basic' OR Performance_Group ='Advance')";
        }
        
    }
    function GPU_Associate_Check($CPU_Number,$TableNumber){
        print("\nGPU_associate_Ckeck\n");
        $TargetTable = "Table_".$TableNumber;//Get The Target Revise Table
        $Max_Budge = $GLOBALS["Max_Budge"];
        $GPU_Search_Bench = $GLOBALS["GPU_Target_Search"];
        $GPU_Search_Brand = $GLOBALS["GPU_Brand"];
        $Platform = $GLOBALS["Platform"];
        if(is_numeric($GLOBALS[$TargetTable]->GPU_Number)){
            print("\nEquip With VGA\n");
            return true;
        }
        else{
            print("\nNOT Equip with VGA\n");
            //Get the CPU Information
            $CPU_sql = "Select * FROM ca.cpu WHERE CPU_Number= '$CPU_Number' ";
            print($CPU_sql);
            $CPU_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $CPU_sql));
            $CPU_Current_Price = intval($CPU_Result["cpu_price"]);
            print("\n$");print($CPU_Current_Price);print("\n");

            //Get The Associated GPU
            $GPU_sql = "Select * FROM ca.gpu WHERE ".$GLOBALS["Performance_Group"]." AND gpu_Bench>'$GPU_Search_Bench' AND GPU_Platform='$Platform' AND ( gpu_Brand=".$GPU_Search_Brand. ")ORDER BY gpu_price LIMIT 0,1";
            print($GPU_sql);
            $GPU_Result = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $GPU_sql));
            $GPU_Current_Price = intval($GPU_Result["gpu_price"]);
            print("\n$");print($GPU_Current_Price);

            //Get the New Price
            $NewTempPrice = TotalPrice()-$GLOBALS["CPU_Price"]-$GLOBALS["GPU_Price"]+$CPU_Current_Price + $GPU_Current_Price;
            print("\nNewTempPrice CPU+ GPU: ");print($NewTempPrice);
            if($NewTempPrice>$Max_Budge){
                return false;
            }
            else{
                return true;
            }
        }
    }
    function GPU_Year_Check($TableNumber){
        //Get CPU Information
        $TargetTable = "Table_".$TableNumber;
        $CPU_Number = $GLOBALS[$TargetTable]->CPU_Number;
        $CPU_sql = "Select LEFT(cpu_year,4) FROM ca.cpu WHERE CPU_Number= '$CPU_Number' ";
        print($CPU_sql);
        $GLOBALS["CPU_Year"] = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $CPU_sql));
        return;
    }
    function CPU_InteVGA_Set(){
        $Software_Type = $GLOBALS["Software_Type"];//Entertainment
        $Max_Budge = $GLOBALS["Max_Budge"];//MaxBudge
        $Platform = $GLOBALS["Platform"];//Desktop
        if($Software_Type=="Entertainment" || $Software_Type=="VideoEdit" || $Software_Type=="Animation" ||$Software_Type=="ArtDraw" ||$Software_Type=="AI_Model"){
            $GLOBALS["CPU_InteVGA"] = "(Inte_VGA ='0' OR Inte_VGA ='1')";
        }
        else if ($Software_Type!="Entertainment" && $Software_Type!="VideoEdit" && $Software_Type!="Animation" && $Software_Type !="ArtDraw"&& $Software_Type !="AI_Model" && $Max_Budge>=40000 && $Platform=="Desktop"){
            $GLOBALS["CPU_InteVGA"] = "(Inte_VGA ='0' OR Inte_VGA ='1')";
        }
        else{
            $GLOBALS["CPU_InteVGA"] = "(Inte_VGA ='1')";
        }
    }
    
    //======================================================================================================================
    //Main
    //======================================================================================================================
    //Global Function
    //Table_1
    $Table_1 = new Specification();
    $Table_1->CPU_Number="";
    $Table_1->MB_Number="";
    $Table_1->GPU_Number="";
    $Table_1->Memory_Number="";
    $Table_1->SSD_Number="";
    $Table_1->HDD_Number="";
    $Table_1->Power_Number="";
    $Table_1->Price=0;
    //Table_2
    $Table_2 = new Specification();
    $Table_2->CPU_Number="";
    $Table_2->MB_Number="";
    $Table_2->GPU_Number="";
    $Table_2->Memory_Number="";
    $Table_2->SSD_Number="";
    $Table_2->HDD_Number="";
    $Table_2->Power_Number="";
    $Table_2->Price=0;
    $Table = array($Table_1,$Table_2);

    $Mini_Budge = intval($_POST["MiniPrice"]);//Mini Budge
    $Max_Budge = intval($_POST["MaxPrice"]);//Max Budge
    $Original_Max_Budge = intval($_POST["MaxPrice"]);//Max Budge
    $Budge_Gap = 0;
    $Platform=$_POST["Platform"];//Desktop
    $CPU_Brand=$_POST["CPU_Brand"];//Intel
    $GPU_Brand=$_POST["GPU_Brand"];//NVIDIA
    $Memory_Require=0;//GB
    $SearchTarget = $_POST["TargetSearch"];//Word,PowerPoint
    $Software_Type=$_POST["SearchSoftwareType"];//Document
    print($Software_Type);
    $Software_Lowest_CPU_Bench=0;
    $Software_Recommend_CPU_Bench=0;
    $Software_Lowest_GPU_Bench=0;
    $Software_Recommend_GPU_Bench=0;
    $OC_Mode = 0;
    $Performance_Group = "";//Basic
    $CPU_Year = 0;
    $CPU_InteVGA = "";
    
    //Search_Temp
    $CPU_Target_Search=0;//Bench
    $GPU_Target_Search=0;//Bench
    $Memory_Target_Search=0;//GB
    $Memory_DDR="";//DDR5
    $Memory_Channel = 0;
    $SSD_Target_Search=0;//GB
    $SSD_Target_Speed=0;//MB
    $HDD_Target_Search=0;//GB
    $MB_Target_Search_Number = 0;//Number
    //Temp Price
    $CPU_Price=0;
    $GPU_Price=0;
    $Memory_Price=0;
    $SSD_Price=0;
    $HDD_Price=0;
    $MB_Price=0;
    $Power_Price=0;
    
    //Deal With CPU Brand And GPU Brand
    if ($CPU_Brand=="AMD&&intel"){
        $CPU_Brand = " ('AMD' OR 'intel')";
    }
    else if($CPU_Brand=="AMD"){
        $CPU_Brand = " 'AMD' ";
    }
    else{
        $CPU_Brand = " 'intel' ";
    }

    if($GPU_Brand=="AMD&&NVIDIA"){
        $GPU_Brand = "('NVIDIA' OR 'AMD')";
    }
    else if($GPU_Brand=="AMD"){
        $GPU_Brand = " 'AMD' ";
    }
    else{
        $GPU_Brand = " 'NVIDIA' ";
    }

    //Check Software Type And Wether Need to OC
    if($Platform=="Desktop"){
        if($Software_Type=="Entertainment" || $Software_Type=="VideoEdit" || $Software_Type=="Animation" ||$Software_Type=="ArtDraw"||$Software_Type=="AI_Model"){
            $OC_Mode = 1;
            $Memory_Channel = 2;
        }
        else if ($Software_Type=="Coding"){
            $OC_Mode = 0;
            $Memory_Channel = 2;
        }
        else{
            $OC_Mode = 0;
            $Memory_Channel = 1;
        }
    }
    else{
        if($Software_Type=="Entertainment" || $Software_Type=="VideoEdit" || $Software_Type=="Animation" ||$Software_Type=="ArtDraw"||$Software_Type=="AI_Model"){
            $OC_Mode = 1;
            $Memory_Channel = 1;
        }
        else{
            $OC_Mode = 0;
            $Memory_Channel = 1;
        }
    }
    

    //Deal With NB Price for MB
    if($Platform=="Laptop"){
        if($Software_Type=="Entertainment" || $Software_Type=="VideoEdit" || $Software_Type=="Animation" ||$Software_Type=="ArtDraw" || $Software_Type=="AI_Model"){//High Performance NB MB
            $Max_Budge = $Max_Budge -20000;
            $Budge_Gap = 20000;
        }
        else{
            $Max_Budge = $Max_Budge -10000;
            $Budge_Gap = 10000;
        }
    }

    //Set Performance Group
    PerformanceGroup_Check();
    //Set InteVGA Froup
    CPU_InteVGA_Set();

    //HelloProtocol
    require_once '../../DatabaseManageUI/DataBaseAccount.php';
    $Return_Result = "";
    //Generate First Time
    BenchMark_And_MemoryRequire($Software_Recommend_CPU_Bench,$Software_Recommend_GPU_Bench,1);
    print("\n===============================First Recommend Table===============================");
    BasicTable($Software_Recommend_CPU_Bench,$Software_Recommend_GPU_Bench,1);
    //$Table_1->Price = TotalPrice();
    print_r($Table);
    if($Table_1->Price>$Max_Budge){
        //print("Section Bigger");
        print("\n===============================Second Basic Table===============================");
        BasicTable($Software_Lowest_CPU_Bench,$Software_Lowest_GPU_Bench,1);
        print_r($Table);
        if($Table_1->Price>$Max_Budge){
            //print($Table_1->Price);
            //print("沒有適合的規格，請嘗試提高預算\n");
            $Suitable_Price = $Table_1->Price;
            $Return_Result = "沒有適合的規格，建議您嘗試提高預算到： $".$Suitable_Price+$Budge_Gap;
            $Table_1->Price = $Table_1->Price+$Budge_Gap;
            print_r($Table_1);
            //ResetGlobal();
            $Max_Budge = $Max_Budge+5000;
            BasicTable($Software_Lowest_CPU_Bench,$Software_Lowest_GPU_Bench,2);
            print("\nTrying Increase the Budge");
            GenerateFeatSpecification(2);//Generate Result Table
        }
        else{
            print("Check Group 01\n");
            $Return_Result = "成功匹配到了適合的規格，也為您匹配了一張可以參考的規格表";
            GenerateFeatSpecification(1);//Generate Result Table
            $Table_1->Price = $Table_1->Price+$Budge_Gap;
            //ResetGlobal();
            $Max_Budge = $Max_Budge+5000;
            BasicTable($Software_Lowest_CPU_Bench,$Software_Lowest_GPU_Bench,2);
            GenerateFeatSpecification(2);//Generate Result Table
            $Table_2->Price = $Table_2->Price+$Budge_Gap;
        }
    }
    else{
        print("Check Group 02");
        $Return_Result = "成功匹配到了適合的規格，也為您匹配了一張可以參考的規格表";
        GenerateFeatSpecification(1);//Match Feat Specification
        $Table_1->Price = $Table_1->Price+$Budge_Gap;
        //ResetGlobal();
        $Max_Budge = $Max_Budge+5000;
        BasicTable($Software_Recommend_CPU_Bench,$Software_Recommend_GPU_Bench,2);
        GenerateFeatSpecification(2);//Generate Result Table
        $Table_2->Price = $Table_2->Price+$Budge_Gap;
    }
    print("\n");
    print($Return_Result);
    if($Return_Result!="成功匹配到了適合的規格，也為您匹配了一張可以參考的規格表"){
        print("\nTable_1\n");
        print_r($Table_1);
        ShowComponent(1);
    }
    else{
        print("\nTable_1\n");
        print_r($Table_1);
        ShowComponent(1);
        print("\nTable_2\n");
        print_r($Table_2);
        ShowComponent(2);
    }
?>
