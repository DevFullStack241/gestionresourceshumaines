use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chat_id')->constrained('chat')->onDelete('cascade');
            $table->unsignedBigInteger('utilisateur_id');
            $table->enum('utilisateur_type', ['Admin', 'Responsable', 'Agent']);
            $table->text('contenu');
            $table->dateTime('date_envoi')->default(now());
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
