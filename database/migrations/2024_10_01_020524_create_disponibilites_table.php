use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisponibilitesTable extends Migration
{
    public function up()
    {
        Schema::create('disponibilites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_id')->constrained('agents')->onDelete('cascade');
            $table->dateTime('date_debut');
            $table->dateTime('date_fin');
            $table->enum('statut', ['disponible', 'occupé'])->default('disponible');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('disponibilites');
    }
}
