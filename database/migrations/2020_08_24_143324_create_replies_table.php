<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replies', function (Blueprint $table) {
            $table->increments('id');
            $table->text('body'); // reply must have a body

            $table->integer('question_id')->unsigned(); //every reply must be conected with the question
                                                        //dmth ktu lidhet reply me pytjen, qe useri bon reply.
            
            $table->integer('user_id'); // every reply can be by the user(including the owner of the question) so we need the user id

            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            // when the question is deleted we dont want the users to be able to reply on a deleted question
            //so when the question is deleted the whole content must be deleted too.
            //so we created a foreign key which the foreign key is the question_id 
            //so when the foreign key is a question_id it must reference on a field in our case it references to 'id'
            // onDelete -- dmth kur e fshijm question, e shtojm keywordin cascade qe e fshin edhe replyt qe jan kan tlidhta me pytjen.
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('replies');
    }
}
