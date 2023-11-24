<div dir="rtl" style="text-align: center; padding-top: 10%;">
    <form action="/calculate" method="post">
        @csrf
        <div>
            <label for="number1">عدد اول:</label>
            <input type="number" step="0.001" id="number1" name="num1" value={{session('num1')}} required>
        </div>
        <div class="form-group">
            <label for="number2">عدد دوم:</label>
            <input type="number" step="0.001" id="number2" name="num2" value={{session('num2')}} required>
        </div>
        <div>
            <label for="operation">یک عملیات انتخاب کنید:</label>
            <select id="operation" name="operation" required>
                <option value="addition">جمع</option>
                <option value="subtraction">تفریق</option>
                <option value="multiplication">ضرب</option>
                <option value="division">تقسیم</option>
            </select>
        </div>
        <button type="submit" >محاسبه</button>
    </form>
    <br>
    <p>{{session('result')?'جواب: '.session('result'):''}}</p>
    <p>{{session('error') ?? '' }}</p>
</div>
