<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProcedureCsv extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        DROP PROCEDURE IF EXISTS addCsvToDb;

        CREATE PROCEDURE `addCsvToDb`(
            idClientc int,
            clientName varchar(100),
            idDealD int,
            dealName varchar(100),
            dateO datetime,
            acceptedO int,
            rejectedO int
            )
            BEGIN
            declare resultC int unsigned default 0;
            declare resultD int unsigned default 0;
            declare results int unsigned default 0;

            set resultC = (SELECT COUNT(*) FROM project.client WHERE idClient = idClientc);

            if resultC = 0 then
              insert into project.client
              values(idClientc,clientName);
           end if;

           set resultD = (SELECT COUNT(*) FROM project.deal WHERE idDeal = idDealD);

            if resultD = 0 then
              insert into project.deal
              values(idDealD,dealname);
           end if;

           set results =  (SELECT COUNT(*) FROM project.order WHERE idClient = idClientc  and idDeal = idDealD and date = dateO and accepted = acceptedO and rejected = rejectedO );

           if results = 0 then
              insert into project.order
              values(0,idClientc,idDealD,dateO,acceptedO,rejectedO);
              select "ok";

end if;

        END
    ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('
        DROP PROCEDURE IF EXISTS addCsvToDb;
        END');
    }
}
