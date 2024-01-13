function changeLanguage(){
    let selectedLanguage = document.getElementById('language-selector').value;

    // Replace 'YOUR_GOOGLE_TRANSLATE_API_KEY' with your actual API key
    const apiKey = 'AIzaSyAj-Pnj5oEsmYx80opR_-KuPbLPdPTviwU';
    const baseUrl = 'https://translation.googleapis.com/language/translate/v2';

    // Get the content to be translated
    const contentToTranslate = $('.header__menu-item').text();

    // Make a request to Google Translate API
    $.ajax({
        url: `${baseUrl}?key=${apiKey}`,
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({
            q: contentToTranslate,
            target: selectedLanguage,
        }),
        success: function (response) {
            // Replace the content with the translated text
            $('.translatable-content').text(response.data.translations[0].translatedText);
        },
        error: function (error) {
            console.error('Translation error:', error);
        },
    });
}
