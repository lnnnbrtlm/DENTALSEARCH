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
            <input class="form-check-input" type="radio" name="q1" id="q1Yes" value="Yes" disabled>
            <label class="form-check-label" for="inlineRadio1">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="q1" id="q1No" value="No" disabled>
            <label class="form-check-label" for="inlineRadio2">No</label>
          </div>
        </td>
        <td></td>
      </tr>
      <tr>
        <td>Are you under medical treatment now? If so, what is the condition being treated?</td>
        <td>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="q2" id="q2Yes" value="Yes" disabled>
            <label class="form-check-label" for="inlineRadio1">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="q2" id="q2No" value="No" disabled>
            <label class="form-check-label" for="inlineRadio3">No</label>
          </div>
        </td>
        <td><input type="answer" name="input2" class="form-control" id="answer2" disabled></td>
      </tr>
      <tr>
        <td>Have you ever had serious illness or surgical operation? If so, what illness or operation?</td>
        <td>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="q3" id="q3Yes" value="Yes" disabled>
            <label class="form-check-label" for="inlineRadio1">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="q3" id="q3No" value="No" disabled>
            <label class="form-check-label" for="inlineRadio3">No</label>
          </div>
        </td>
        <td><input type="answer" name="input3" class="form-control" id="answer3" disabled></td>
      </tr>

      <tr>
        <td>Have you ever been hospitalized? If so, when and why?</td>
        <td>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="q4" id="q4Yes" value="Yes" disabled>
            <label class="form-check-label" for="inlineRadio1">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="q4" id="q4No" value="No" disabled>
            <label class="form-check-label" for="inlineRadio3">No</label>
          </div>
        </td>
        <td><input type="answer" name="input4" class="form-control" id="answer4" disabled></td>
      </tr>

      <tr>
        <td>Are you taking any prescription/non-prescription medication? If so, please specify</td>
        <td>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="q5" id="q5Yes" value="Yes" disabled>
            <label class="form-check-label" for="inlineRadio1">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="q5" id="q5No" value="No" disabled>
            <label class="form-check-label" for="inlineRadio3">No</label>
          </div>
        </td>
        <td><input type="answer" name="input5" class="form-control" id="answer5" disabled></td>
      </tr>

      <tr>
        <td>Do you use tobacco products?</td>
        <td>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="q6" id="q6Yes" value="Yes" disabled>
            <label class="form-check-label" for="inlineRadio1">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="q6" id="q6No" value="No" disabled>
            <label class="form-check-label" for="inlineRadio3">No</label>
          </div>
        </td>
        <td></td>
      </tr>

      <tr>
        <td>Do you use alcohol, cocaine or other dangerous drugs?</td>
        <td>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="q7" id="q7Yes" value="Yes" disabled>
            <label class="form-check-label" for="inlineRadio1">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="q7" id="q7No" value="No" disabled>
            <label class="form-check-label" for="inlineRadio3">No</label>
          </div>
        </td>
        <td></td>
      </tr>
<!--
      <tr>
        <td>Are you allergic to any of the following:</td>
        <td>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Local Anesthetic (ex. Lidocaine)" name="techno[]" id="local" disabled>
            <label class="form-check-label" for="flexCheckDefault">
              Local Anesthetic (ex. Lidocaine)
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Penicillin, Antibiotics" name="techno[]" id="peni" disabled>
            <label class="form-check-label" for="flexCheckDefault">
              Penicillin, Antibiotics
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Sulfa Drugs" name="techno[]" id="sulfa" disabled>
            <label class="form-check-label" for="flexCheckDefault">
              Sulfa Drugs
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Aspirin" name="techno[]" id="aspirin" disabled>
            <label class="form-check-label" for="flexCheckDefault">
              Aspirin
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Latex" name="techno[]" id="latex" disabled>
            <label class="form-check-label" for="flexCheckDefault">
              Latex
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Others (Type what)" name="techno[]" id="others" disabled>
            <label class="form-check-label" for="flexCheckDefault">
              Others (Type what)
            </label>
          </div>
        </td>
        <td><input type="text" name="input8" class="form-control" id="answer8" disabled></td>
      </tr>
-->
      <tr>
        <td>Bleeding Time</td>
        <td>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="q9" id="q9Yes" value="Yes" disabled>
            <label class="form-check-label" for="inlineRadio1">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="q9" id="q9No" value="No" disabled>
            <label class="form-check-label" for="inlineRadio3">No</label>
          </div>
        </td>
        <td><input type="text" name="input9" class="form-control" id="answer9"></td>
      </tr>

      <tr>
        <td><b>For Women only</b></td>
      <td></td><td></td>
      </tr>

      <tr>
        <td>Are you pregnant?</td>
        <td>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="q10" id="q10Yes" value="Yes" disabled>
            <label class="form-check-label" for="inlineRadio1">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="q10" id="q10No" value="No" disabled>
            <label class="form-check-label" for="inlineRadio3">No</label>
          </div>
        </td>
      </tr>

      <tr>
        <td>Are you nursing?</td>
        <td>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="q11" id="q11Yes" value="Yes" disabled>
            <label class="form-check-label" for="inlineRadio1">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="q11" id="q11No" value="No" disabled>
            <label class="form-check-label" for="inlineRadio3">No</label>
          </div>
        </td>
      </tr>

      <tr>
        <td>Are you taking birth control pills?</td>
        <td>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="q12" id="q12Yes" value="Yes" disabled>
            <label class="form-check-label" for="inlineRadio1">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="q12" id="q12No" value="No" disabled>
            <label class="form-check-label" for="inlineRadio3">No</label>
          </div>
        </td>
      </tr>

      <tr>
        <td>Blood type</td>
        <td></td>
        <td><input type="text" class="form-control" name="bloodtype" id="bloodtype" disabled></td>
      </tr>

      <tr>
        <td>Blood pressure</td>
        <td></td>
        <td><input type="text" class="form-control" name="bloodpressure" id="bloodpressure" disabled></td>
      </tr>
<!--
      <tr>
        <td>Do you have or have you had any of the following? Check which apply</td>
        <td>


          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="tech" value="High Blood Pressure" id="highblood"disabled>
            <label class="form-check-label" for="flexCheckDefault">
              High Blood Pressure
            </label><br>

            <input class="form-check-input" type="checkbox" name="tech" value="Low Blood Pressure" id="lowblood"disabled>
            <label class="form-check-label" for="flexCheckDefault">
              Low Blood Pressure
            </label><br>

            <input class="form-check-input" type="checkbox" name="tech[]" value="Epilepsy / Convulsions" id="epilepsy"disabled>
            <label class="form-check-label" for="flexCheckDefault">
              Epilepsy / Convulsions
            </label><br>

            <input class="form-check-input" type="checkbox" name="tech[]" value="AIDS / HIV Infection" id="aids"disabled>
            <label class="form-check-label" for="flexCheckDefault">
              AIDS / HIV Infection
            </label><br>

            <input class="form-check-input" type="checkbox" name="tech[]" value="Sexualy Transmitted disease" id="std"disabled>
            <label class="form-check-label" for="flexCheckDefault">
              Sexualy Transmitted disease
            </label><br>

            <input class="form-check-input" type="checkbox" name="tech[]" value="Stomach Troubles / Ulcers" id="stu"disabled>
            <label class="form-check-label" for="flexCheckDefault">
              Stomach Troubles / Ulcers
            </label><br>

            <input class="form-check-input" type="checkbox" name="tech[]" value="Fainting Seizure" id="seizure"disabled>
            <label class="form-check-label" for="flexCheckDefault">
              Fainting Seizure
            </label><br>

            <input class="form-check-input" type="checkbox" name="tech[]" value="Rapid Weight Loss" id="rapid"disabled>
            <label class="form-check-label" for="flexCheckDefault">
              Rapid Weight Loss
            </label><br>

            <input class="form-check-input" type="checkbox" name="tech[]" value="Radiation Therapy" id="radiation"disabled>
            <label class="form-check-label" for="flexCheckDefault">
              Radiation Therapy
            </label><br>

            <input class="form-check-input" type="checkbox" name="tech[]" value="Radiation Therapy" id="joint" disabled>
            <label class="form-check-label" for="flexCheckDefault">
              Joint Replacement
            </label><br>



          </div>

        </td>
        <td><input type="text" class="form-control" name="inputlast" id="answerlast" disabled></td>
      </tr>
-->
    </tbody>
  </table>
</div>