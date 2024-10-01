use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuartDeTravailTable extends Migration
{
    public function up()
    {
        Schema::create('quart_de_travail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('affectation_id')->constrained('affectations')->onDelete('cascade');
            $table->dateTime('date_debut');
            $table->dateTime('date_fin');
            $table->integer('heures_travail')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('quart_de_travail');
    }
}
