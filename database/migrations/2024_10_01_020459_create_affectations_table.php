use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffectationsTable extends Migration
{
    public function up()
    {
        Schema::create('affectations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mission_id')->constrained('missions')->onDelete('cascade');
            $table->foreignId('agent_id')->constrained('agents')->onDelete('cascade');
            $table->foreignId('poste_id')->constrained('postes')->onDelete('cascade');
            $table->dateTime('date_affectation')->default(now());
            $table->enum('statut', ['en attente', 'confirmée', 'annulée'])->default('en attente');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('affectations');
    }
}
