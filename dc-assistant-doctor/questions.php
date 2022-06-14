<h4>Questions</h4>

<div class="table-responsive">
  <table id="example" class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>Question</th>
        <th>Answer</th>
        <th>Input</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Are you in good health?</td>
        <td>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="question_one" id="inlineRadio1" value="Yes" required>
            <label class="form-check-label" for="inlineRadio1">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="question_one" id="inlineRadio2" value="No"required>
            <label class="form-check-label" for="inlineRadio2">No</label>
          </div>
        </td>
        <td><input type="answer" class="form-control" id="answer" onKeyDown="limitText(this,30);" 
onKeyUp="limitText(this,30)" disabled></td>
      </tr>
      <tr>
        <td>Are you under medical treatment now? If so, what is the condition being treated?</td>
        <td>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="question_two" id="inlineRadio1" value="Yes" required>
            <label class="form-check-label" for="inlineRadio1">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="question_two" id="inlineRadio2" value="No"required>
            <label class="form-check-label" for="inlineRadio3">No</label>
          </div>
        </td>
        <td><input type="answer" class="form-control" name="input_two" id="answer" onKeyDown="limitText(this,30);" 
onKeyUp="limitText(this,30)"></td>
      </tr>
      <tr>
        <td>Have you ever had serious illness or surgical operation? If so, what illness or operation?</td>
        <td>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="question_three" id="inlineRadio1" value="Yes" required>
            <label class="form-check-label" for="inlineRadio1">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="question_three" id="inlineRadio2" value="No"required>
            <label class="form-check-label" for="inlineRadio3">No</label>
          </div>
        </td>
        <td><input type="answer" class="form-control" name="input_three" id="answer" onKeyDown="limitText(this,30);" 
onKeyUp="limitText(this,30)"></td>
      </tr>

      <tr>
        <td>Have you ever been hospitalized? If so, when and why?</td>
        <td>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="question_four" id="inlineRadio1" value="Yes"required>
            <label class="form-check-label" for="inlineRadio1">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="question_four" id="inlineRadio2" value="No"required>
            <label class="form-check-label" for="inlineRadio3">No</label>
          </div>
        </td>
        <td><input type="answer" class="form-control" name="input_four" id="answer" onKeyDown="limitText(this,30);" 
onKeyUp="limitText(this,30)"></td>
      </tr>

      <tr>
        <td>Are you taking any prescription/non-prescription medication? If so, please specify</td>
        <td>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="question_five" id="inlineRadio1" value="Yes"required>
            <label class="form-check-label" for="inlineRadio1">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="question_five" id="inlineRadio2" value="No"required>
            <label class="form-check-label" for="inlineRadio3">No</label>
          </div>
        </td>
        <td><input type="answer" class="form-control" name="input_five" id="answer" onKeyDown="limitText(this,30);" 
onKeyUp="limitText(this,30)"></td>
      </tr>

      <tr>
        <td>Do you use tobacco products?</td>
        <td>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="question_six" id="inlineRadio1" value="Yes"required>
            <label class="form-check-label" for="inlineRadio1">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="question_six" id="inlineRadio2" value="No"required>
            <label class="form-check-label" for="inlineRadio3">No</label>
          </div>
        </td>
        <td><input type="answer" class="form-control" id="answer" onKeyDown="limitText(this,30);" 
onKeyUp="limitText(this,30)" disabled></td>
      </tr>

      <tr>
        <td>Do you use alcohol, cocaine or other dangerous drugs?</td>
        <td>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="question_seven" id="inlineRadio1" value="Yes"required>
            <label class="form-check-label" for="inlineRadio1">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="question_seven" id="inlineRadio2" value="No"required>
            <label class="form-check-label" for="inlineRadio3">No</label>
          </div>
        </td>
        <td><input type="answer" class="form-control" id="answer" onKeyDown="limitText(this,30);" 
onKeyUp="limitText(this,30)" disabled></td>
      </tr>
<!--
      <tr>
        <td>Are you allergic to any of the following:</td>
        <td>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="techno[]" value="Local Anesthetic" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Local Anesthetic (ex. Lidocaine)
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="techno[]" value="Penicillin, Antibiotics" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Penicillin, Antibiotics
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="techno[]" value="Sulfa Drugs" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Sulfa Drugs
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="techno[]" value="Aspirin" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Aspirin
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="techno[]" value="Latex" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Latex
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="techno[]" value="Others" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Others 
            </label>
          </div>
        </td>-->
        <td><input type="answer" class="form-control" name="input_eight" id="answer" onKeyDown="limitText(this,30);" 
onKeyUp="limitText(this,30)"></td>
      </tr>

      <tr>
        <td>Bleeding Time</td>
        <td>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="question_nine" id="inlineRadio1" value="Yes"required>
            <label class="form-check-label" for="inlineRadio1">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="question_nine" id="inlineRadio2" value="No"required>
            <label class="form-check-label" for="inlineRadio3">No</label>
          </div>
        </td>
        <td><input type="answer" class="form-control" name="input_nine" id="answer" onKeyDown="limitText(this,30);" 
onKeyUp="limitText(this,30)"></td>
      </tr>

      <tr>
        <td><b>For Women only</b></td>

      </tr>

      <tr>
        <td>Are you pregnant?</td>
        <td>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="question_ten" id="inlineRadio1" value="Yes">
            <label class="form-check-label" for="inlineRadio1">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="question_ten" id="inlineRadio2" value="No">
            <label class="form-check-label" for="inlineRadio3">No</label>
          </div>
        </td>
        <td><input type="answer" class="form-control" id="answer" onKeyDown="limitText(this,30);" 
onKeyUp="limitText(this,30)" disabled></td>
      </tr>

      <tr>
        <td>Are you nursing?</td>
        <td>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="question_eleven" id="inlineRadio1" value="Yes">
            <label class="form-check-label" for="inlineRadio1">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="question_eleven" id="inlineRadio2" value="No">
            <label class="form-check-label" for="inlineRadio3">No</label>
          </div>
        </td>
        <td><input type="answer" class="form-control" id="answer" onKeyDown="limitText(this,30);" 
onKeyUp="limitText(this,30)" disabled></td>
      </tr>

      <tr>
        <td>Are you taking birth control pills?</td>
        <td>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="question_twelve" id="inlineRadio1" value="Yes">
            <label class="form-check-label" for="inlineRadio1">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="question_twelve" id="inlineRadio2" value="No">
            <label class="form-check-label" for="inlineRadio3">No</label>
          </div>
        </td>
        <td><input type="answer" class="form-control"  id="answer" onKeyDown="limitText(this,30);" 
onKeyUp="limitText(this,30)" disabled></td>
      </tr>

      <tr>
        <td>Blood type</td>
        <td></td>
        <td><input type="answer" class="form-control" name="question_thirteen" id="answer" onKeyDown="limitText(this,30);" 
onKeyUp="limitText(this,30)"></td>
      </tr>

      <tr>
        <td>Blood pressure</td>
        <td></td>
        <td><input type="answer" class="form-control" name="question_fourteen" id="answer" onKeyDown="limitText(this,30);" 
onKeyUp="limitText(this,30)"></td>
      </tr>
<!--
      <tr>
        <td>Do you have or have you had any of the following? Check which apply</td>
        <td>


            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="tech[]" value="High Blood Pressure" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            High Blood Pressure
            </label><br>

            <input class="form-check-input" type="checkbox" name="tech[]" value="Low Blood Pressure" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Low Blood Pressure
            </label><br>

            <input class="form-check-input" type="checkbox" name="tech[]" value="Epilepsy/Convulsions" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Epilepsy/Convulsions
            </label><br>

            <input class="form-check-input" type="checkbox" name="tech[]" value="AIDS/HIV Infection" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            AIDS/HIV Infection
            </label><br>

            <input class="form-check-input" type="checkbox" name="tech[]" value="Sexually Transmitted disease" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Sexualy Transmitted disease
            </label><br>

            <input class="form-check-input" type="checkbox" name="tech[]" value="Stomach Troubles/Ulcers" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Stomach Troubles/Ulcers
            </label><br>

            <input class="form-check-input" type="checkbox" name="tech[]" value="Fainting Seizure" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Fainting Seizure
            </label><br>

            <input class="form-check-input" type="checkbox" name="tech[]" value="Rapid Weight Loss" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Rapid Weight Loss
            </label><br>

            <input class="form-check-input" type="checkbox" name="tech[]" value="Radiation Therapy" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Radiation Therapy
            </label><br>

           

          </div>

          
          
        </td>
        <td><input type="answer" class="form-control" name="input_fifteen" id="answer" onKeyDown="limitText(this,30);" 
onKeyUp="limitText(this,30)"></td>
      </tr>
-->
    </tbody>
  </table>

</div>
<script language="javascript" type="text/javascript">
function limitText(limitField, limitNum) {
    if (limitField.value.length > limitNum) {
        limitField.value = limitField.value.substring(0, limitNum);
    }
}
</script>