<?php

// Modified from 'BooksRestService' included in week 8 course materials.

require "dbinfo.php";
require "RestService.php";
require "District.php";

class DistrictRestService extends RestService
{
    private $districts;

    public function __construct()
    {
        parent::__construct("districts");
    }

    public function performGet($url, $parameters, $requestBody, $accept) 
	{
		switch (count($parameters))
		{
            // baseURL/districts
            case 1:
                header('Content-type: application/json; charseutf-8');
                header('no-cache,no-store');
                $this->getAllDistricts();
                echo json_encode();
                break;
            // baseURL/districts/{district_id}
            case 2:
                $district_id = $parameters[1];
                $district = $this->getDistrictById($district_id);
                if ($district != null)
                {
                    header('Content-Type: application/json; charset=utf-8');
                    header('no-cache,no-store');
                    echo json_encode($district);
                }
                else
                {
                    $this->notFoundResponse();
                }
                break;
            default:
                $this->methodNotAllowedResponse();
        }
    }

    public function performPost($url, $parameters, $requestBody, $accept)
    {
        global $dbServer, $dbUsername, $dbPassword, $dbDatabase;

        $newDistrict = $this->extractDistrictFromJSON($requestBody);
        $connection = new mysqli($dbServer, $dbUsername, $dbPassword, $dbDatabase);
        if (!$connection->connect_error) 
        {
            $sql = "INSERT INTO postcode_districts (
                district_code, 
                provisional_female, 
                provisional_male, 
                full_male, 
                full_female, 
                points_1, 
                points_2, 
                points_3, 
                points_4, 
                points_5, 
                points_6, 
                points_7, 
                points_8, 
                points_9, 
                points_10, 
                points_11, 
                points_12, 
                points_13, 
                points_14, 
                points_15, 
                points_16, 
                points_17, 
                points_18, 
                points_19, 
                points_20, 
                points_21, 
                points_22, 
                points_23, 
                points_24, 
                points_25, 
                points_26, 
                points_27, 
                points_28, 
                points_29, 
                points_30, 
                points_31, 
                points_32, 
                points_33, 
                points_34, 
                points_35, 
                points_36, 
                points_37, 
                points_38, 
                points_39, 
                points_40, 
                points_41, 
                points_42, 
                points_43, 
                points_44, 
                points_45, 
                points_46, 
                points_47, 
                points_48, 
                points_49, 
                points_50, 
                points_51, 
                points_52, 
                points_53, 
                points_54, 
                points_55, 
                points_56, 
                points_57, 
                points_58, 
                points_59, 
                points_60, 
                points_61, 
                points_62, 
                points_63, 
                points_64, 
                points_65, 
                points_66, 
                points_67, 
                points_68, 
                points_69, 
                points_70, 
                points_71, 
                points_72, 
                points_73, 
                points_74, 
                points_75, 
                points_76, 
                points_77, 
                points_78, 
                points_79, 
                points_80, 
                points_81, 
                points_82, 
                points_83, 
                points_84, 
                points_85, 
                points_86, 
                points_87, 
                points_88, 
                points_89, 
                points_90, 
                points_91, 
                points_92, 
                points_93, 
                points_94, 
                points_95, 
                points_96, 
                points_97, 
                points_98, 
                points_99, 
                points_100
            ) VALUES (
                ?, ?, ?, ?, ?, 
                ?, ?, ?, ?, ?, 
                ?, ?, ?, ?, ?, 
                ?, ?, ?, ?, ?, 
                ?, ?, ?, ?, ?, 
                ?, ?, ?, ?, ?, 
                ?, ?, ?, ?, ?, 
                ?, ?, ?, ?, ?, 
                ?, ?, ?, ?, ?, 
                ?, ?, ?, ?, ?, 
                ?, ?, ?, ?, ?, 
                ?, ?, ?, ?, ?, 
                ?, ?, ?, ?, ?, 
                ?, ?, ?, ?, ?, 
                ?, ?, ?, ?, ?, 
                ?, ?, ?, ?, ?, 
                ?, ?, ?, ?, ?, 
                ?, ?, ?, ?, ?, 
                ?, ?, ?, ?, ?, 
                ?, ?, ?, ?, ?, 
                ?, ?, ?, ?, ? 
            )";

            $statement = $connection->prepare($sql);

            $district_code = $newDistrict->getDistrictCode();
            $provisional_male = $newDistrict->getProvisionalMale();
            $provisional_female = $newDistrict->getProvisionalFemale();
            $full_male = $newDistrict->getFullMale();
            $full_female = $newDistrict->getFullFemale();
            $points_1 = $newDistrict->getPoints1();
            $points_2 = $newDistrict->getPoints2();
            $points_3 = $newDistrict->getPoints3();
            $points_4 = $newDistrict->getPoints4();
            $points_5 = $newDistrict->getPoints5();
            $points_6 = $newDistrict->getPoints6();
            $points_7 = $newDistrict->getPoints7();
            $points_8 = $newDistrict->getPoints8();
            $points_9 = $newDistrict->getPoints9();
            $points_10 = $newDistrict->getPoints10();
            $points_11 = $newDistrict->getPoints11();
            $points_12 = $newDistrict->getPoints12();
            $points_13 = $newDistrict->getPoints13();
            $points_14 = $newDistrict->getPoints14();
            $points_15 = $newDistrict->getPoints15();
            $points_16 = $newDistrict->getPoints16();
            $points_17 = $newDistrict->getPoints17();
            $points_18 = $newDistrict->getPoints18();
            $points_19 = $newDistrict->getPoints19();
            $points_20 = $newDistrict->getPoints20();
            $points_21 = $newDistrict->getPoints21();
            $points_22 = $newDistrict->getPoints22();
            $points_23 = $newDistrict->getPoints23();
            $points_24 = $newDistrict->getPoints24();
            $points_25 = $newDistrict->getPoints25();
            $points_26 = $newDistrict->getPoints26();
            $points_27 = $newDistrict->getPoints27();
            $points_28 = $newDistrict->getPoints28();
            $points_29 = $newDistrict->getPoints29();
            $points_30 = $newDistrict->getPoints30();
            $points_31 = $newDistrict->getPoints31();
            $points_32 = $newDistrict->getPoints32();
            $points_33 = $newDistrict->getPoints33();
            $points_34 = $newDistrict->getPoints34();
            $points_35 = $newDistrict->getPoints35();
            $points_36 = $newDistrict->getPoints36();
            $points_37 = $newDistrict->getPoints37();
            $points_38 = $newDistrict->getPoints38();
            $points_39 = $newDistrict->getPoints39();
            $points_40 = $newDistrict->getPoints40();
            $points_41 = $newDistrict->getPoints41();
            $points_42 = $newDistrict->getPoints42();
            $points_43 = $newDistrict->getPoints43();
            $points_44 = $newDistrict->getPoints44();
            $points_45 = $newDistrict->getPoints45();
            $points_46 = $newDistrict->getPoints46();
            $points_47 = $newDistrict->getPoints47();
            $points_48 = $newDistrict->getPoints48();
            $points_49 = $newDistrict->getPoints49();
            $points_50 = $newDistrict->getPoints50();
            $points_51 = $newDistrict->getPoints51();
            $points_52 = $newDistrict->getPoints52();
            $points_53 = $newDistrict->getPoints53();
            $points_54 = $newDistrict->getPoints54();
            $points_55 = $newDistrict->getPoints55();
            $points_56 = $newDistrict->getPoints56();
            $points_57 = $newDistrict->getPoints57();
            $points_58 = $newDistrict->getPoints58();
            $points_59 = $newDistrict->getPoints59();
            $points_60 = $newDistrict->getPoints60();
            $points_61 = $newDistrict->getPoints61();
            $points_62 = $newDistrict->getPoints62();
            $points_63 = $newDistrict->getPoints63();
            $points_64 = $newDistrict->getPoints64();
            $points_65 = $newDistrict->getPoints65();
            $points_66 = $newDistrict->getPoints66();
            $points_67 = $newDistrict->getPoints67();
            $points_68 = $newDistrict->getPoints68();
            $points_69 = $newDistrict->getPoints69();
            $points_70 = $newDistrict->getPoints70();
            $points_71 = $newDistrict->getPoints71();
            $points_72 = $newDistrict->getPoints72();
            $points_73 = $newDistrict->getPoints73();
            $points_74 = $newDistrict->getPoints74();
            $points_75 = $newDistrict->getPoints75();
            $points_76 = $newDistrict->getPoints76();
            $points_77 = $newDistrict->getPoints77();
            $points_78 = $newDistrict->getPoints78();
            $points_79 = $newDistrict->getPoints79();
            $points_80 = $newDistrict->getPoints80();
            $points_81 = $newDistrict->getPoints81();
            $points_82 = $newDistrict->getPoints82();
            $points_83 = $newDistrict->getPoints83();
            $points_84 = $newDistrict->getPoints84();
            $points_85 = $newDistrict->getPoints85();
            $points_86 = $newDistrict->getPoints86();
            $points_87 = $newDistrict->getPoints87();
            $points_88 = $newDistrict->getPoints88();
            $points_89 = $newDistrict->getPoints89();
            $points_90 = $newDistrict->getPoints90();
            $points_91 = $newDistrict->getPoints91();
            $points_92 = $newDistrict->getPoints92();
            $points_93 = $newDistrict->getPoints93();
            $points_94 = $newDistrict->getPoints94();
            $points_95 = $newDistrict->getPoints95();
            $points_96 = $newDistrict->getPoints96();
            $points_97 = $newDistrict->getPoints97();
            $points_98 = $newDistrict->getPoints98();
            $points_99 = $newDistrict->getPoints99();
            $points_100 = $newDistrict->getPoints100();

            $statement->bind_param(
                'siiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii',
                $district_code, 
                $provisional_male, 
                $provisional_female, 
                $full_male, 
                $full_female, 
                $points_1, 
                $points_2, 
                $points_3, 
                $points_4, 
                $points_5, 
                $points_6, 
                $points_7, 
                $points_8, 
                $points_9, 
                $points_10, 
                $points_11, 
                $points_12, 
                $points_13, 
                $points_14, 
                $points_15, 
                $points_16, 
                $points_17, 
                $points_18, 
                $points_19, 
                $points_20, 
                $points_21, 
                $points_22, 
                $points_23, 
                $points_24, 
                $points_25, 
                $points_26, 
                $points_27, 
                $points_28, 
                $points_29, 
                $points_30, 
                $points_31, 
                $points_32, 
                $points_33, 
                $points_34, 
                $points_35, 
                $points_36, 
                $points_37, 
                $points_38, 
                $points_39, 
                $points_40, 
                $points_41, 
                $points_42, 
                $points_43, 
                $points_44, 
                $points_45, 
                $points_46, 
                $points_47, 
                $points_48, 
                $points_49, 
                $points_50, 
                $points_51, 
                $points_52, 
                $points_53, 
                $points_54, 
                $points_55, 
                $points_56, 
                $points_57, 
                $points_58, 
                $points_59, 
                $points_60, 
                $points_61, 
                $points_62, 
                $points_63, 
                $points_64, 
                $points_65, 
                $points_66, 
                $points_67, 
                $points_68, 
                $points_69, 
                $points_70, 
                $points_71, 
                $points_72, 
                $points_73, 
                $points_74, 
                $points_75, 
                $points_76, 
                $points_77, 
                $points_78, 
                $points_79, 
                $points_80, 
                $points_81, 
                $points_82, 
                $points_83, 
                $points_84, 
                $points_85, 
                $points_86, 
                $points_87, 
                $points_88, 
                $points_89, 
                $points_90, 
                $points_91, 
                $points_92, 
                $points_93, 
                $points_94, 
                $points_95, 
                $points_96, 
                $points_97, 
                $points_98, 
                $points_99, 
                $points_100 
            );
            $result = $statement->execute();
            // POST request failed, capture failure message
            if ($result == FALSE)
            {
                $errorMessage = $statement->error;
            }
            $statement->close();
            $connection->close();
            // POST request succeeded, so no returned data
            if ($result == TRUE)
            {
                $this->noContentResponse();
            }
            else
            {
                $this->errorResponse($errorMessage);
            }
        }
    }

    public function performPut($url, $parameters, $requestBody, $accept)
    {
        global $dbServer, $dbUsername, $dbPassword, $dbDatabase;

        $newDistrict = $this->extractDistrictFromJSON($requestBody);
        $connection = new mysqli($dbServer, $dbUsername, $dbPassword, $dbDatabase);
        if (!$connection->connect_error) 
        {
            $sql = "UPDATE postcode_districts SET 
                provisional_female = ?, 
                provisional_male = ?, 
                full_male = ?, 
                full_female = ?, 
                points_1 = ?, 
                points_2 = ?, 
                points_3 = ?, 
                points_4 = ?, 
                points_5 = ?, 
                points_6 = ?, 
                points_7 = ?, 
                points_8 = ?, 
                points_9 = ?, 
                points_10 = ?, 
                points_11 = ?, 
                points_12 = ?, 
                points_13 = ?, 
                points_14 = ?, 
                points_15 = ?, 
                points_16 = ?, 
                points_17 = ?, 
                points_18 = ?, 
                points_19 = ?, 
                points_20 = ?, 
                points_21 = ?, 
                points_22 = ?, 
                points_23 = ?, 
                points_24 = ?, 
                points_25 = ?, 
                points_26 = ?, 
                points_27 = ?, 
                points_28 = ?, 
                points_29 = ?, 
                points_30 = ?, 
                points_31 = ?, 
                points_32 = ?, 
                points_33 = ?, 
                points_34 = ?, 
                points_35 = ?, 
                points_36 = ?, 
                points_37 = ?, 
                points_38 = ?, 
                points_39 = ?, 
                points_40 = ?, 
                points_41 = ?, 
                points_42 = ?, 
                points_43 = ?, 
                points_44 = ?, 
                points_45 = ?, 
                points_46 = ?, 
                points_47 = ?, 
                points_48 = ?, 
                points_49 = ?, 
                points_50 = ?, 
                points_51 = ?, 
                points_52 = ?, 
                points_53 = ?, 
                points_54 = ?, 
                points_55 = ?, 
                points_56 = ?, 
                points_57 = ?, 
                points_58 = ?, 
                points_59 = ?, 
                points_60 = ?, 
                points_61 = ?, 
                points_62 = ?, 
                points_63 = ?, 
                points_64 = ?, 
                points_65 = ?, 
                points_66 = ?, 
                points_67 = ?, 
                points_68 = ?, 
                points_69 = ?, 
                points_70 = ?, 
                points_71 = ?, 
                points_72 = ?, 
                points_73 = ?, 
                points_74 = ?, 
                points_75 = ?, 
                points_76 = ?, 
                points_77 = ?, 
                points_78 = ?, 
                points_79 = ?, 
                points_80 = ?, 
                points_81 = ?, 
                points_82 = ?, 
                points_83 = ?, 
                points_84 = ?, 
                points_85 = ?, 
                points_86 = ?, 
                points_87 = ?, 
                points_88 = ?, 
                points_89 = ?, 
                points_90 = ?, 
                points_91 = ?, 
                points_92 = ?, 
                points_93 = ?, 
                points_94 = ?, 
                points_95 = ?, 
                points_96 = ?, 
                points_97 = ?, 
                points_98 = ?, 
                points_99 = ?, 
                points_100 = ?
                WHERE district_code = ?";

            $statement = $connection->prepare($sql);

            $district_code = $newDistrict->getDistrictCode();
            $provisional_male = $newDistrict->getProvisionalMale();
            $provisional_female = $newDistrict->getProvisionalFemale();
            $full_male = $newDistrict->getFullMale();
            $full_female = $newDistrict->getFullFemale();
            $points_1 = $newDistrict->getPoints1();
            $points_2 = $newDistrict->getPoints2();
            $points_3 = $newDistrict->getPoints3();
            $points_4 = $newDistrict->getPoints4();
            $points_5 = $newDistrict->getPoints5();
            $points_6 = $newDistrict->getPoints6();
            $points_7 = $newDistrict->getPoints7();
            $points_8 = $newDistrict->getPoints8();
            $points_9 = $newDistrict->getPoints9();
            $points_10 = $newDistrict->getPoints10();
            $points_11 = $newDistrict->getPoints11();
            $points_12 = $newDistrict->getPoints12();
            $points_13 = $newDistrict->getPoints13();
            $points_14 = $newDistrict->getPoints14();
            $points_15 = $newDistrict->getPoints15();
            $points_16 = $newDistrict->getPoints16();
            $points_17 = $newDistrict->getPoints17();
            $points_18 = $newDistrict->getPoints18();
            $points_19 = $newDistrict->getPoints19();
            $points_20 = $newDistrict->getPoints20();
            $points_21 = $newDistrict->getPoints21();
            $points_22 = $newDistrict->getPoints22();
            $points_23 = $newDistrict->getPoints23();
            $points_24 = $newDistrict->getPoints24();
            $points_25 = $newDistrict->getPoints25();
            $points_26 = $newDistrict->getPoints26();
            $points_27 = $newDistrict->getPoints27();
            $points_28 = $newDistrict->getPoints28();
            $points_29 = $newDistrict->getPoints29();
            $points_30 = $newDistrict->getPoints30();
            $points_31 = $newDistrict->getPoints31();
            $points_32 = $newDistrict->getPoints32();
            $points_33 = $newDistrict->getPoints33();
            $points_34 = $newDistrict->getPoints34();
            $points_35 = $newDistrict->getPoints35();
            $points_36 = $newDistrict->getPoints36();
            $points_37 = $newDistrict->getPoints37();
            $points_38 = $newDistrict->getPoints38();
            $points_39 = $newDistrict->getPoints39();
            $points_40 = $newDistrict->getPoints40();
            $points_41 = $newDistrict->getPoints41();
            $points_42 = $newDistrict->getPoints42();
            $points_43 = $newDistrict->getPoints43();
            $points_44 = $newDistrict->getPoints44();
            $points_45 = $newDistrict->getPoints45();
            $points_46 = $newDistrict->getPoints46();
            $points_47 = $newDistrict->getPoints47();
            $points_48 = $newDistrict->getPoints48();
            $points_49 = $newDistrict->getPoints49();
            $points_50 = $newDistrict->getPoints50();
            $points_51 = $newDistrict->getPoints51();
            $points_52 = $newDistrict->getPoints52();
            $points_53 = $newDistrict->getPoints53();
            $points_54 = $newDistrict->getPoints54();
            $points_55 = $newDistrict->getPoints55();
            $points_56 = $newDistrict->getPoints56();
            $points_57 = $newDistrict->getPoints57();
            $points_58 = $newDistrict->getPoints58();
            $points_59 = $newDistrict->getPoints59();
            $points_60 = $newDistrict->getPoints60();
            $points_61 = $newDistrict->getPoints61();
            $points_62 = $newDistrict->getPoints62();
            $points_63 = $newDistrict->getPoints63();
            $points_64 = $newDistrict->getPoints64();
            $points_65 = $newDistrict->getPoints65();
            $points_66 = $newDistrict->getPoints66();
            $points_67 = $newDistrict->getPoints67();
            $points_68 = $newDistrict->getPoints68();
            $points_69 = $newDistrict->getPoints69();
            $points_70 = $newDistrict->getPoints70();
            $points_71 = $newDistrict->getPoints71();
            $points_72 = $newDistrict->getPoints72();
            $points_73 = $newDistrict->getPoints73();
            $points_74 = $newDistrict->getPoints74();
            $points_75 = $newDistrict->getPoints75();
            $points_76 = $newDistrict->getPoints76();
            $points_77 = $newDistrict->getPoints77();
            $points_78 = $newDistrict->getPoints78();
            $points_79 = $newDistrict->getPoints79();
            $points_80 = $newDistrict->getPoints80();
            $points_81 = $newDistrict->getPoints81();
            $points_82 = $newDistrict->getPoints82();
            $points_83 = $newDistrict->getPoints83();
            $points_84 = $newDistrict->getPoints84();
            $points_85 = $newDistrict->getPoints85();
            $points_86 = $newDistrict->getPoints86();
            $points_87 = $newDistrict->getPoints87();
            $points_88 = $newDistrict->getPoints88();
            $points_89 = $newDistrict->getPoints89();
            $points_90 = $newDistrict->getPoints90();
            $points_91 = $newDistrict->getPoints91();
            $points_92 = $newDistrict->getPoints92();
            $points_93 = $newDistrict->getPoints93();
            $points_94 = $newDistrict->getPoints94();
            $points_95 = $newDistrict->getPoints95();
            $points_96 = $newDistrict->getPoints96();
            $points_97 = $newDistrict->getPoints97();
            $points_98 = $newDistrict->getPoints98();
            $points_99 = $newDistrict->getPoints99();
            $points_100 = $newDistrict->getPoints100();

            $statement->bind_param(
                'iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiis', 
                $provisional_male, 
                $provisional_female, 
                $full_male, 
                $full_female, 
                $points_1, 
                $points_2, 
                $points_3, 
                $points_4, 
                $points_5, 
                $points_6, 
                $points_7, 
                $points_8, 
                $points_9, 
                $points_10, 
                $points_11, 
                $points_12, 
                $points_13, 
                $points_14, 
                $points_15, 
                $points_16, 
                $points_17, 
                $points_18, 
                $points_19, 
                $points_20, 
                $points_21, 
                $points_22, 
                $points_23, 
                $points_24, 
                $points_25, 
                $points_26, 
                $points_27, 
                $points_28, 
                $points_29, 
                $points_30, 
                $points_31, 
                $points_32, 
                $points_33, 
                $points_34, 
                $points_35, 
                $points_36, 
                $points_37, 
                $points_38, 
                $points_39, 
                $points_40, 
                $points_41, 
                $points_42, 
                $points_43, 
                $points_44, 
                $points_45, 
                $points_46, 
                $points_47, 
                $points_48, 
                $points_49, 
                $points_50, 
                $points_51, 
                $points_52, 
                $points_53, 
                $points_54, 
                $points_55, 
                $points_56, 
                $points_57, 
                $points_58, 
                $points_59, 
                $points_60, 
                $points_61, 
                $points_62, 
                $points_63, 
                $points_64, 
                $points_65, 
                $points_66, 
                $points_67, 
                $points_68, 
                $points_69, 
                $points_70, 
                $points_71, 
                $points_72, 
                $points_73, 
                $points_74, 
                $points_75, 
                $points_76, 
                $points_77, 
                $points_78, 
                $points_79, 
                $points_80, 
                $points_81, 
                $points_82, 
                $points_83, 
                $points_84, 
                $points_85, 
                $points_86, 
                $points_87, 
                $points_88, 
                $points_89, 
                $points_90, 
                $points_91, 
                $points_92, 
                $points_93, 
                $points_94, 
                $points_95, 
                $points_96, 
                $points_97, 
                $points_98, 
                $points_99, 
                $points_100, 
                $district_code
            );
            $result = $statement->execute();
            // Update failed, capture failure message
            if ($result == FALSE)
            {
                $errorMessage = $statement->error;
            }
            $statement->close();
            $connection->close();
            // Update succeeded, so no returned data
            if ($result == TRUE)
            {
                $this->noContentResponse();
            }
            else
            {
                $this->errorResponse($errorMessage);
            }
        }
    }

    public function performDelete($url, $parameters, $requestBody, $accept)
    {
        global $dbServer, $dbUsername, $dbPassword, $dbDatabase;
        // baseURL/districts/{district_id}
        if (count($parameters) == 2)
        {
            $connection = new mysqli($dbServer, $dbUsername, $dbPassword, $dbDatabase);
            if (!$connection->connect_error)
            {
                $district_id = $parameters[1];
                $sql = "DELETE FROM postcode_districts WHERE district_code = ?";
                $statement = $connection->prepare($sql);
                $statement->bind_param('s', $district_id);
                $result = $statement->execute();
                // Deletion failed, record error message
                if ($result == FALSE)
                {
                    $errorMessage = $statement->error;
                }
                $statement->close();
                $connection->close();
                // Deletion succeeded, no response needed
                if ($result == TRUE)
                {
                    $this->noContentResponse();
                }
                else
                {
                    $this->errorResponse($errorMessage);
                }
            }
        }
    }

    private function getAllDistricts()
    {
        global $dbServer, $dbUsername, $dbPassword, $dbDatabase;

        $connection = new mysqli($dbServer, $dbUsername, $dbPassword, $dbDatabase);
        if (!$connection->connect_error)
        {
            $sql = "SELECT * FROM postcode_districts";
            if ($result = $connection->query($sql))
            {
                while ($row = $result->fetch_assoc())
                {
                    $this->districts[] = new District(
                        $row["district_code"], 
                        $row["provisional_male"], 
                        $row["provisional_female"], 
                        $row["full_male"], 
                        $row["full_female"], 
                        $row["points1"], 
                        $row["points2"], 
                        $row["points3"], 
                        $row["points4"], 
                        $row["points5"], 
                        $row["points6"], 
                        $row["points7"], 
                        $row["points8"], 
                        $row["points9"], 
                        $row["points10"], 
                        $row["points11"], 
                        $row["points12"], 
                        $row["points13"], 
                        $row["points14"], 
                        $row["points15"], 
                        $row["points16"], 
                        $row["points17"], 
                        $row["points18"], 
                        $row["points19"], 
                        $row["points20"], 
                        $row["points21"], 
                        $row["points22"], 
                        $row["points23"], 
                        $row["points24"], 
                        $row["points25"], 
                        $row["points26"], 
                        $row["points27"], 
                        $row["points28"], 
                        $row["points29"], 
                        $row["points30"], 
                        $row["points31"], 
                        $row["points32"], 
                        $row["points33"], 
                        $row["points34"], 
                        $row["points35"], 
                        $row["points36"], 
                        $row["points37"], 
                        $row["points38"], 
                        $row["points39"], 
                        $row["points40"], 
                        $row["points41"], 
                        $row["points42"], 
                        $row["points43"], 
                        $row["points44"], 
                        $row["points45"], 
                        $row["points46"], 
                        $row["points47"], 
                        $row["points48"], 
                        $row["points49"], 
                        $row["points50"], 
                        $row["points51"], 
                        $row["points52"], 
                        $row["points53"], 
                        $row["points54"], 
                        $row["points55"], 
                        $row["points56"], 
                        $row["points57"], 
                        $row["points58"], 
                        $row["points59"], 
                        $row["points60"], 
                        $row["points61"], 
                        $row["points62"], 
                        $row["points63"], 
                        $row["points64"], 
                        $row["points65"], 
                        $row["points66"], 
                        $row["points67"], 
                        $row["points68"], 
                        $row["points69"], 
                        $row["points70"], 
                        $row["points71"], 
                        $row["points72"], 
                        $row["points73"], 
                        $row["points74"], 
                        $row["points75"], 
                        $row["points76"], 
                        $row["points77"], 
                        $row["points78"], 
                        $row["points79"], 
                        $row["points80"], 
                        $row["points81"], 
                        $row["points82"], 
                        $row["points83"], 
                        $row["points84"], 
                        $row["points85"], 
                        $row["points86"], 
                        $row["points87"], 
                        $row["points88"], 
                        $row["points89"], 
                        $row["points90"], 
                        $row["points91"], 
                        $row["points92"], 
                        $row["points93"], 
                        $row["points94"], 
                        $row["points95"], 
                        $row["points96"], 
                        $row["points97"], 
                        $row["points98"], 
                        $row["points99"], 
                        $row["points100"] 
                    );
                }
                $result->close();
            }
            $connection->close();
        }
    }

    private function getDistrictById($district_id)
    {
        global $dbServer, $dbUsername, $dbPassword, $dbDatabase;

        $connection = new mysqli($dbServer, $dbUsername, $dbPassword, $dbDatabase);
        if (!$connection->connect_error)
        {
            $sql = "SELECT * FROM postcode_districts WHERE district_code = ?";
            $statement = $connection->prepare($sql);
            $statement->bind_param('s', $district_id);
            $statement->execute();
            $statement->store_result();
            $statement->bind_result(
                $district_code,
                $provisional_male, 
                $provisional_female, 
                $full_male, 
                $full_female, 
                $points_1, 
                $points_2, 
                $points_3, 
                $points_4, 
                $points_5, 
                $points_6, 
                $points_7, 
                $points_8, 
                $points_9, 
                $points_10, 
                $points_11, 
                $points_12, 
                $points_13, 
                $points_14, 
                $points_15, 
                $points_16, 
                $points_17, 
                $points_18, 
                $points_19, 
                $points_20, 
                $points_21, 
                $points_22, 
                $points_23, 
                $points_24, 
                $points_25, 
                $points_26, 
                $points_27, 
                $points_28, 
                $points_29, 
                $points_30, 
                $points_31, 
                $points_32, 
                $points_33, 
                $points_34, 
                $points_35, 
                $points_36, 
                $points_37, 
                $points_38, 
                $points_39, 
                $points_40, 
                $points_41, 
                $points_42, 
                $points_43, 
                $points_44, 
                $points_45, 
                $points_46, 
                $points_47, 
                $points_48, 
                $points_49, 
                $points_50, 
                $points_51, 
                $points_52, 
                $points_53, 
                $points_54, 
                $points_55, 
                $points_56, 
                $points_57, 
                $points_58, 
                $points_59, 
                $points_60, 
                $points_61, 
                $points_62, 
                $points_63, 
                $points_64, 
                $points_65, 
                $points_66, 
                $points_67, 
                $points_68, 
                $points_69, 
                $points_70, 
                $points_71, 
                $points_72, 
                $points_73, 
                $points_74, 
                $points_75, 
                $points_76, 
                $points_77, 
                $points_78, 
                $points_79, 
                $points_80, 
                $points_81, 
                $points_82, 
                $points_83, 
                $points_84, 
                $points_85, 
                $points_86, 
                $points_87, 
                $points_88, 
                $points_89, 
                $points_90, 
                $points_91, 
                $points_92, 
                $points_93, 
                $points_94, 
                $points_95, 
                $points_96, 
                $points_97, 
                $points_98, 
                $points_99, 
                $points_100
            );
            if ($statement->fetch())
            {
                return new District(
                    $district_code, 
                    $provisional_male, 
                    $provisional_female, 
                    $full_male, 
                    $full_female, 
                    $points_1, 
                    $points_2, 
                    $points_3, 
                    $points_4, 
                    $points_5, 
                    $points_6, 
                    $points_7, 
                    $points_8, 
                    $points_9, 
                    $points_10, 
                    $points_11, 
                    $points_12, 
                    $points_13, 
                    $points_14, 
                    $points_15, 
                    $points_16, 
                    $points_17, 
                    $points_18, 
                    $points_19, 
                    $points_20, 
                    $points_21, 
                    $points_22, 
                    $points_23, 
                    $points_24, 
                    $points_25, 
                    $points_26, 
                    $points_27, 
                    $points_28, 
                    $points_29, 
                    $points_30, 
                    $points_31, 
                    $points_32, 
                    $points_33, 
                    $points_34, 
                    $points_35, 
                    $points_36, 
                    $points_37, 
                    $points_38, 
                    $points_39, 
                    $points_40, 
                    $points_41, 
                    $points_42, 
                    $points_43, 
                    $points_44, 
                    $points_45, 
                    $points_46, 
                    $points_47, 
                    $points_48, 
                    $points_49, 
                    $points_50, 
                    $points_51, 
                    $points_52, 
                    $points_53, 
                    $points_54, 
                    $points_55, 
                    $points_56, 
                    $points_57, 
                    $points_58, 
                    $points_59, 
                    $points_60, 
                    $points_61, 
                    $points_62, 
                    $points_63, 
                    $points_64, 
                    $points_65, 
                    $points_66, 
                    $points_67, 
                    $points_68, 
                    $points_69, 
                    $points_70, 
                    $points_71, 
                    $points_72, 
                    $points_73, 
                    $points_74, 
                    $points_75, 
                    $points_76, 
                    $points_77, 
                    $points_78, 
                    $points_79, 
                    $points_80, 
                    $points_81, 
                    $points_82, 
                    $points_83, 
                    $points_84, 
                    $points_85, 
                    $points_86, 
                    $points_87, 
                    $points_88, 
                    $points_89, 
                    $points_90, 
                    $points_91, 
                    $points_92, 
                    $points_93, 
                    $points_94, 
                    $points_95, 
                    $points_96, 
                    $points_97, 
                    $points_98, 
                    $points_99, 
                    $points_100
                );
            }
            else
            {
                return null;
            }
            $statement->close();
            $connection->close();
        }
    }

    private function extractDistrictFromJSON($requestBody)
    {
        $districtsArray = json_decode($requestBody);
        $district = new District(
            $districtsArray["district_code"], 
            $districtsArray["provisional_male"], 
            $districtsArray["provisional_female"], 
            $districtsArray["full_male"], 
            $districtsArray["full_female"], 
            $districtsArray["points1"], 
            $districtsArray["points2"], 
            $districtsArray["points3"], 
            $districtsArray["points4"], 
            $districtsArray["points5"], 
            $districtsArray["points6"], 
            $districtsArray["points7"], 
            $districtsArray["points8"], 
            $districtsArray["points9"], 
            $districtsArray["points10"], 
            $districtsArray["points11"], 
            $districtsArray["points12"], 
            $districtsArray["points13"], 
            $districtsArray["points14"], 
            $districtsArray["points15"], 
            $districtsArray["points16"], 
            $districtsArray["points17"], 
            $districtsArray["points18"], 
            $districtsArray["points19"], 
            $districtsArray["points20"], 
            $districtsArray["points21"], 
            $districtsArray["points22"], 
            $districtsArray["points23"], 
            $districtsArray["points24"], 
            $districtsArray["points25"], 
            $districtsArray["points26"], 
            $districtsArray["points27"], 
            $districtsArray["points28"], 
            $districtsArray["points29"], 
            $districtsArray["points30"], 
            $districtsArray["points31"], 
            $districtsArray["points32"], 
            $districtsArray["points33"], 
            $districtsArray["points34"], 
            $districtsArray["points35"], 
            $districtsArray["points36"], 
            $districtsArray["points37"], 
            $districtsArray["points38"], 
            $districtsArray["points39"], 
            $districtsArray["points40"], 
            $districtsArray["points41"], 
            $districtsArray["points42"], 
            $districtsArray["points43"], 
            $districtsArray["points44"], 
            $districtsArray["points45"], 
            $districtsArray["points46"], 
            $districtsArray["points47"], 
            $districtsArray["points48"], 
            $districtsArray["points49"], 
            $districtsArray["points50"], 
            $districtsArray["points51"], 
            $districtsArray["points52"], 
            $districtsArray["points53"], 
            $districtsArray["points54"], 
            $districtsArray["points55"], 
            $districtsArray["points56"], 
            $districtsArray["points57"], 
            $districtsArray["points58"], 
            $districtsArray["points59"], 
            $districtsArray["points60"], 
            $districtsArray["points61"], 
            $districtsArray["points62"], 
            $districtsArray["points63"], 
            $districtsArray["points64"], 
            $districtsArray["points65"], 
            $districtsArray["points66"], 
            $districtsArray["points67"], 
            $districtsArray["points68"], 
            $districtsArray["points69"], 
            $districtsArray["points70"], 
            $districtsArray["points71"], 
            $districtsArray["points72"], 
            $districtsArray["points73"], 
            $districtsArray["points74"], 
            $districtsArray["points75"], 
            $districtsArray["points76"], 
            $districtsArray["points77"], 
            $districtsArray["points78"], 
            $districtsArray["points79"], 
            $districtsArray["points80"], 
            $districtsArray["points81"], 
            $districtsArray["points82"], 
            $districtsArray["points83"], 
            $districtsArray["points84"], 
            $districtsArray["points85"], 
            $districtsArray["points86"], 
            $districtsArray["points87"], 
            $districtsArray["points88"], 
            $districtsArray["points89"], 
            $districtsArray["points90"], 
            $districtsArray["points91"], 
            $districtsArray["points92"], 
            $districtsArray["points93"], 
            $districtsArray["points94"], 
            $districtsArray["points95"], 
            $districtsArray["points96"], 
            $districtsArray["points97"], 
            $districtsArray["points98"], 
            $districtsArray["points99"], 
            $districtsArray["points100"]
        );
        unset($districtsArray);
        return $district;
    }
}
?>