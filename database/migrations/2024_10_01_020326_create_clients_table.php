use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('nom_entreprise');
            $table->string('raison_sociale')->nullable();
            $table->string('email');
            $table->string('telephone')->nullable();
            $table->string('adresse')->nullable();
            $table->text('informations_supplementaires')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
