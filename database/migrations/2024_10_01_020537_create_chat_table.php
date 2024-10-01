use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatTable extends Migration
{
    public function up()
    {
        Schema::create('chat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mission_id')->constrained('missions')->onDelete('cascade');
            $table->string('titre')->nullable();
            $table->dateTime('date_creation')->default(now());
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chat');
    }
}
