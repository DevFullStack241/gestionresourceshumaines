use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('utilisateur_id');
            $table->enum('utilisateur_type', ['Admin', 'Responsable', 'Agent']);
            $table->enum('type_notification', ['nouvelle_mission', 'changement_mission', 'nouveau_message', 'alerte']);
            $table->text('contenu');
            $table->dateTime('date_envoi')->default(now());
            $table->boolean('vue')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
