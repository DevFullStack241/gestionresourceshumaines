use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionsTable extends Migration
{
    public function up()
    {
        Schema::create('missions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            $table->foreignId('responsable_id')->constrained('responsables')->onDelete('cascade');
            $table->string('titre');
            $table->text('description')->nullable();
            $table->string('lieu')->nullable();
            $table->dateTime('date_debut');
            $table->dateTime('date_fin');
            $table->enum('statut', ['à venir', 'en cours', 'terminée'])->default('à venir');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('missions');
    }
}
